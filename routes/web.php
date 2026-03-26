<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\GooglePasswordResetController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blog/{id}/{slug}', [BlogController::class, 'single_blog'])->name('blog.single');
Route::post('/blog/{id}/{slug}', [BlogController::class, 'comment_store'])->name('comments.store');

Route::get('/categories/{id}/{slug}', [BlogController::class, 'category_blog'])->name('category.single');
Route::get('/tags/{id}/{slug}', [BlogController::class, 'tag_blog'])->name('tag.single');

Route::get('/search', [BlogController::class, 'search'])->name('search');

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

// Users Panel
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('author.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('author.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('author.profile.destroy');

    // Google password reset
    Route::post('/google/send-reset-link', [GooglePasswordResetController::class, 'googleSendResetLink'])->name('author.profile.google.send.reset.link');
    Route::get('/google/reset-password/{token}', [GooglePasswordResetController::class, 'showGoogleResetForm'])->name('author.profile.google.reset.password');
    Route::post('/google/reset-password', [GooglePasswordResetController::class, 'googleResetPassword'])->name('author.profile.google.update.password');

    // Route::prefix('dashboard')->group(function () {
    Route::get('/panel', [DashboardController::class, 'index'])->middleware(['verified'])->name('author.dashboard');

    // Blogs
    Route::get('/blogs', [DashboardController::class, 'blogs'])->name('author.dashboard.blogs');
    Route::get('/blogs/add', [DashboardController::class, 'blog_add'])->name('author.dashboard.blogs.add');
    Route::post('/blogs/insert', [DashboardController::class, 'blog_store'])->name('author.dashboard.blogs.insert');

    Route::get('/blogs/edit/{id}', [DashboardController::class, 'blog_edit'])->name('author.dashboard.blogs.edit');
    Route::put('/blogs/edit/{id}', [DashboardController::class, 'blog_update'])->name('author.dashboard.blogs.update');

    Route::get('/blogs/delete/{id}', [DashboardController::class, 'blog_delete'])->name('author.dashboard.blogs.delete');
    Route::delete('/Blogs/delete/{id}', [DashboardController::class, 'blog_delete']);

    // Categories
    Route::get('/categories', [DashboardController::class, 'categories'])->name('author.dashboard.categories');
    Route::get('/categories/add', [DashboardController::class, 'cat_add'])->name('author.dashboard.categories.add');
    Route::post('/categories/insert', [DashboardController::class, 'cat_store'])->name('author.dashboard.categories.insert');

    Route::get('/categories/edit/{id}', [DashboardController::class, 'cat_edit'])->name('author.dashboard.categories.edit');
    Route::post('/categories/edit/{id}', [DashboardController::class, 'cat_update'])->name('author.dashboard.categories.update');

    Route::get('/categories/delete/{id}', [DashboardController::class, 'cat_delete'])->name('author.dashboard.categories.delete');
    Route::delete('/categories/delete/{id}', [DashboardController::class, 'cat_delete']);

    // Tags
    Route::get('/tags', [DashboardController::class, 'tags'])->name('author.dashboard.tags');
    Route::get('/tags/add', [DashboardController::class, 'tag_add'])->name('author.dashboard.tags.add');
    Route::post('/tags/insert', [DashboardController::class, 'tag_store'])->name('author.dashboard.tags.insert');

    Route::get('/tags/edit/{id}', [DashboardController::class, 'tag_edit'])->name('author.dashboard.tags.edit');
    Route::post('/tags/edit/{id}', [DashboardController::class, 'tag_update'])->name('author.dashboard.tags.update');

    Route::get('/tags/delete/{id}', [DashboardController::class, 'tag_delete'])->name('author.dashboard.tags.delete');
    Route::delete('/tags/delete/{id}', [DashboardController::class, 'tag_delete']);

    // Comments
    Route::get('/comments', [DashboardController::class, 'comments'])->name('author.dashboard.comments');

    Route::get('/comments/edit/{id}', [DashboardController::class, 'comment_edit'])->name('author.dashboard.comments.edit');
    Route::post('/comments/edit/{id}', [DashboardController::class, 'comment_update'])->name('author.dashboard.comments.update');

    Route::get('/comments/delete/{id}', [DashboardController::class, 'comment_delete'])->name('author.dashboard.comments.delete');
    Route::delete('/comments/delete/{id}', [DashboardController::class, 'comment_delete']);
    // });
});

// Admin Auth Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/users', [AdminController::class, 'authors'])->name('admin.authors');
        Route::get('/users/delete/{id}', [AdminController::class, 'author_delete'])->name('admin.authors.delete');
        Route::delete('/users/delete/{id}', [AdminController::class, 'author_delete']);

        Route::get('/comments', [AdminController::class, 'comments'])->name('admin.comments');
        Route::get('/comments/edit/{id}', [AdminController::class, 'comment_edit'])->name('admin.comments.edit');
        Route::post('/comments/edit/{id}', [AdminController::class, 'comment_update'])->name('admin.comments.update');
        Route::get('/comments/delete/{id}', [AdminController::class, 'comment_delete'])->name('admin.comments.delete');
        Route::delete('/comments/delete/{id}', [AdminController::class, 'comment_delete']);

        Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    });
});

require __DIR__ . '/auth.php';
