<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\View\View;
use App\Models\User;

class AdminController extends Controller
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

    public function index() {
        return view('admin.dashboard', [
            'pageName' => "dashboard",
            'UsersCount' => User::count(),
            'CommentsCount' => Comments::count(),
        ]);
    }

    public function authors(): View
    {
        return view('admin.panel.authors', [
            'pageName' => "authors",
            'authors' => User::orderby('updated_at','desc')->get(),
        ]);
    }

    public function author_delete($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User Deleted');
    }

    public function comments(): View
    {
        return view('admin.panel.comments', [
            'pageName' => "comments",
            'comments' => Comments::orderby('updated_at','desc')->get(),
        ]);
    }

    public function comment_edit($id)
    {
        return view('admin.panel.comment-edit', [
            'pageName' => 'comments',
            'comment' => Comments::with('user')->where('id', $id)->first()
        ]);
    }

    public function comment_update(Request $request, $id)
    {
        Comments::find($id)->update($request->all());
        return redirect()->route('admin.comments')->with('success', 'Comment Updated');
    }

    public function comment_delete($id)
    {
        Comments::find($id)->delete();
        return redirect()->back()->with('success', 'Comment Deleted');
    }
}
