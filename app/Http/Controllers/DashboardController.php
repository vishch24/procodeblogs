<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Tags;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    /**
     * Default parameters
     */
    protected $pageName;
    public function __construct()
    {
        $this->pageName = '';
        view()->share('pageName', $this->pageName);
    }

    /**
     * Display the user's dashboard.
     */
    public function index(): View
    {
        return view('author.dashboard', [
            'pageName' => "dashboard",
            'BlogsCount' => Blogs::where('user_id', Auth::user()->id)->count(),
            'CategoriesCount' => Categories::where('user_id', Auth::user()->id)->count(),
            'CommentsCount' => Comments::where('user_id', Auth::user()->id)->count(),
            'TagsCount' => Tags::where('user_id', Auth::user()->id)->count(),
        ]);
    }

    /**
     * Blogs Operations
     */
    public function blogs(): View
    {
        return view('author.panel.blogs', [
            'pageName' => "blogs",
            'blogs' => Blogs::where('user_id', Auth::user()->id)->orderby('updated_at', 'desc')->get(),
        ]);
    }

    public function blog_add()
    {
        return view('author.panel.blog-add', [
            'pageName' => 'blogs',
            'categories' => Categories::get(),
            'tags' => Tags::get()
        ]);
    }

    public function blog_store(Request $request)
    {
        $validator = Validator::make(data: $request->all(), rules: [
            'name' => ['required', 'string', 'max:255'],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'slug' => ['required', 'string', 'lowercase', 'max:255'],
            'post_meta' => ['required', 'string', 'max:255'],
            'post_desc' => ['required', 'string'],
            'user_id' => ['integer'],
            'cat_id' => ['required', 'array'],
            'cat_id.*' => 'exists:categories,id',
            'tag_id' => ['required', 'array'],
            'tag_id.*' => 'exists:tags,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        } else {
            if ($request->hasFile('img')) {
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('assets/img/blog'), $imageName);

                $data = [
                    'name' => $request->name,
                    'img' => $imageName,
                    'slug' => $request->slug,
                    'post_meta' => $request->post_meta,
                    'post_desc' => $request->post_desc,
                    'user_id' => Auth::user()->id
                ];

                $blog = Blogs::create($data);

                $blog->categories()->attach($request->cat_id);
                $blog->tags()->attach($request->tag_id);

                return redirect()->route('author.dashboard.blogs')->with('success', 'Blog Added');
            }
        }
    }

    public function blog_edit($id)
    {
        return view('author.panel.blog-edit', [
            'pageName' => 'blogs',
            'blog' => Blogs::with('categories', 'tags')->where('id', $id)->first(),
            'categories' => Categories::get(),
            'tags' => Tags::get(),
        ]);
    }

    public function blog_update(Request $request, $id)
    {
        $validator = Validator::make(data: $request->all(), rules: [
            'name' => ['required', 'string', 'max:255'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'slug' => ['required', 'string', 'lowercase', 'max:255'],
            'post_meta' => ['required', 'string', 'max:255'],
            'post_desc' => ['required', 'string'],
            'user_id' => ['integer'],
            'cat_id' => ['required', 'array'],
            'cat_id.*' => 'exists:categories,id',
            'tag_id' => ['required', 'array'],
            'tag_id.*' => 'exists:tags,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        } else {
            $blog = Blogs::find($id);

            if ($request->hasFile('img')) {
                // Delete image from public folder
                if ($blog->img && File::exists(public_path('assets/img/blog/' . $blog->img))) {
                    File::delete(public_path('assets/img/blog/' . $blog->img));
                }

                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(public_path('assets/img/blog'), $imageName);
                $blog->img = $imageName;
            }

            $blog->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'post_meta' => $request->post_meta,
                'post_desc' => $request->post_desc,
                'user_id' => Auth::user()->id
            ]);

            $blog->categories()->sync($request->cat_id);
            $blog->tags()->sync($request->tag_id);

            return redirect()->route('author.dashboard.blogs')->with('success', 'Blog Updated');
        }
    }

    public function blog_delete($id)
    {
        $blog = Blogs::find($id);

        // Delete image from public folder
        if ($blog->img && File::exists(public_path('assets/img/blog/' . $blog->img))) {
            File::delete(public_path('assets/img/blog/' . $blog->img));
        }

        $blog->categories()->detach();
        $blog->tags()->detach();
        $blog->delete();
        return redirect()->back()->with('success', 'Blog Deleted');
    }

    /**
     * Categories Operations
     */
    public function categories(): View
    {
        return view('author.panel.categories', [
            'pageName' => "categories",
            'categories' => Categories::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function cat_add()
    {
        return view('author.panel.cat-add', ['pageName' => 'categories']);
    }

    public function cat_store(Request $request): RedirectResponse
    {
        // echo Auth::user()->id; exit;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'user_id' => ['integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ];

        Categories::create($data);
        return redirect()->route('author.dashboard.categories')->with('success', 'Category Added');
    }

    public function cat_edit($id)
    {
        return view('author.panel.cat-edit', [
            'pageName' => 'categories',
            'category' => Categories::where('id', $id)->first()
        ]);
    }

    public function cat_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'user_id' => ['integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        $data = [
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ];

        Categories::find($id)->update($data);
        return redirect()->route('author.dashboard.categories')->with('success', 'Category Updated');
    }

    public function cat_delete($id)
    {
        Categories::find($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted');
    }

    /**
     * Tags Operations
     */
    public function tags(): View
    {
        return view('author.panel.tags', [
            'pageName' => "tags",
            'tags' => Tags::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function tag_add()
    {
        return view('author.panel.tag-add', ['pageName' => 'tags']);
    }

    public function tag_store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'user_id' => ['integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ];

        Tags::create($data);
        return redirect()->route('author.dashboard.tags')->with('success', 'Tag Added');
    }

    public function tag_edit($id)
    {
        return view('author.panel.tag-edit', [
            'pageName' => 'tags',
            'tag' => Tags::where('id', $id)->first()
        ]);
    }

    public function tag_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'user_id' => ['integer'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ];

        Tags::find($id)->update($data);
        return redirect()->route('author.dashboard.tags')->with('success', 'Tag Updated');
    }

    public function tag_delete($id)
    {
        Tags::find($id)->delete();
        return redirect()->back()->with('success', 'Tag Deleted');
    }

    /**
     * Comments Operations
     */
    public function comments()
    {
        return view('author.panel.comments', [
            'pageName' => "comments",
            'comments' => Comments::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function comment_edit($id)
    {
        return view('author.panel.comment-edit', [
            'pageName' => 'comments',
            'comment' => Comments::with('user')->where('id', $id)->first()
        ]);
    }

    public function comment_update(Request $request, $id): RedirectResponse
    {
        Comments::find($id)->update($request->all());
        return redirect()->route('author.dashboard.comments')->with('success', 'Comment Updated');
    }

    public function comment_delete($id)
    {
        Comments::find($id)->delete();
        return redirect()->back()->with('success', 'Comment Deleted');
    }
}
