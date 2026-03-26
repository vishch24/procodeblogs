<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Categories;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Comments;
use App\Models\User;

class BlogController extends Controller
{
    protected $pageName;

    public function __construct()
    {
        $this->pageName = '';
        view()->share([
            'pageName' =>  $this->pageName,
            'sideRecentPosts' => Blogs::orderby('updated_at', 'desc')->take(5)->get(),
            'sideCat' => Categories::get(),
            'sideTag' => Tags::get(),
        ]);
    }

    public function index(Request $request)
    {
        // Get the current page (default to 1)
        $currentPage = $request->query('page', 1);

        $featuredBlog = Blogs::orderBy('updated_at', 'desc')->first();

        // If there are no blogs at all
        if (!$featuredBlog) {
            return view("frontend.index", [
                'pageName' => 'home',
                'sideRecentPosts' => 0,
                'sideCat' => 0,
                'sideTag' => 0,
                'featuredBlog' => null,
                'blogs' => collect(), // empty collection to avoid errors in foreach
                'totalPages' => 0,
                'currentPage' => 1
            ]);
        }

        // Get total blogs count
        $totalBlogs = Blogs::count();

        // If there's a featured blog, exclude it from the total count (only for pagination calculation)
        if ($featuredBlog) {
            $totalBlogs--;
        }

        // if ($totalBlogs) {
        // Set per-page limits
        $perPage = ($currentPage == 1) ? 4 : 6;

        // Fetch blogs query, ordered by latest update
        $blogsQuery = Blogs::where('id', '!=', $featuredBlog->id)->orderBy('updated_at', 'desc');

        // **Fix Offset Calculation**
        if ($currentPage == 1) {
            $skipCount = 0; // No skipping for first page
        } else {
            $skipCount = 4 + (($currentPage - 2) * 6);
        }

        // Fetch blogs for the current page
        $blogs = $blogsQuery->skip($skipCount)->take($perPage)->get();

        // **Fix Total Page Count**
        $remainingBlogs = $totalBlogs - 4; // Excluding the first 4 shown on page 1
        $totalPages = 1 + ceil($remainingBlogs / 6); // First page has 4, rest have 6

        return view("frontend.index", [
            'pageName' => 'home',
            'featuredBlog' => $featuredBlog,
            'blogs' => $blogs,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage
        ]);
        // }

    }

    public function single_blog($id, $slug)
    {
        $blog = Blogs::where('id', $id)->where('slug', $slug)->first();

        if (!$blog) {
            abort(404);
        }

        return view("frontend.single-blog", [
            // 'pageName' => 'home',
            'singleBlog' => $blog,
        ]);
    }

    public function comment_store(Request $request, $id, $slug)
    {
        $blog = Blogs::findOrFail($id);
        $validator = Validator::make(data: $request->all(), rules: [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        if (Auth::check() && Auth::user()->id) {
            $comment = Comments::create([
                'blog_id' => $id,
                'user_id' => Auth::user()->id,
                'parent_id' => $request->parent_id,
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description,
                'if_author' => Auth::user()->id == $blog->user_id ? 'yes' : 'no',
                'approved' => 'yes',
            ]);

            if ($comment) {
                return redirect()->back()->with('success', 'Comment added successfully!');
            } else {
                return redirect()->back()->with('error', $comment->errors());
            }
        }

        $comment = Comments::create([
            'blog_id' => $id,
            'user_id' => null,
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'if_author' => 'no',
        ]);

        // Create cookies (minutes). 525600 = 1 year.
        $minutes = 60 * 24 * 365;

        // Use cookie() helper which returns a Symfony cookie instance
        $cookieName = cookie('guest_name', $request->name, $minutes);
        $cookieEmail = cookie('guest_email', $request->email, $minutes);

        if ($comment) {
            return redirect()->back()->with('success', 'Comment added successfully! Your comment will be displayed when approved by admin.')
                ->withCookie($cookieName)
                ->withCookie($cookieEmail);
        } else {
            return redirect()->back()->with('error', $comment->errors());
        }
    }

    public function category_blog($id, $slug)
    {
        // Fetch the category using the ID
        $category = Categories::findOrFail($id);

        // Paginate the blogs associated with this category
        $blogs = $category->blogs()->paginate(6);  // Adjust the number 6 as per your requirements

        return view("frontend.category-single", [
            // 'pageName' => 'home',
            'category' => $category,
            'blogs' => $blogs,  // Pass the paginated blogs to the view
        ]);
    }

    public function tag_blog($id, $slug)
    {
        // Fetch the tag using the ID
        $tag = Tags::findOrFail($id);

        // Paginate the blogs associated with this tag
        $blogs = $tag->blogs()->paginate(6);  // Adjust the number 6 as per your requirements

        return view("frontend.tag-single", [
            // 'pageName' => 'home',
            'tag' => $tag,
            'blogs' => $blogs,  // Pass the paginated blogs to the view
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query from the request
        // dd($query);
        // Search in the User model
        $blogs = Blogs::where('name', 'LIKE', "%$query%")->get();
        // Search in the Post model
        $categories = Categories::where('name', 'LIKE', "%$query%")->get();
        // Search in the User model
        $tags = Tags::where('name', 'LIKE', "%$query%")->get();

        // Merge the results from both models
        // $results = $users->merge($posts); // Combine the User and Post collections
        $results = collect([$blogs, $categories, $tags])->collapse();

        // Return the results to the view
        return view('frontend.search-results', compact('results', 'query'));
    }
}
