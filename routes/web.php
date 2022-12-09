<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ContactListController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('sitemap.xml', SiteMapController::class);

//Subscribe
Route::get('subscription/confirm', [SubscriptionController::class, 'confirm'])->name('subscription.confirm');
Route::get('unsubscribe', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

//feedback
Route::view('contact', 'frontend.contact.create')->name('contact');

//Article
Route::get('article', [ArticleController::class, 'index'])->name('articles');
Route::get('article/{articleId}/{articleHeading?}', [ArticleController::class, 'show'])->name('get-article');
Route::get('category/article/{categoryAlias}', [CategoryController::class, 'getArticles'])->name('articles-by-category');
Route::get('keyword/article/{keywordName}', [KeywordController::class, 'getArticles'])->name('articles-by-keyword');
Route::get('search', [ArticleController::class, 'search'])->name('search-article');

//Comment
Route::post('comment/{articleId}', [CommentController::class, 'store'])->name('add-comment');
Route::get('comment/{commentId}/confirm', [CommentController::class, 'confirmComment'])->name('confirm-comment');

//Category
Route::get('category/{categoryId}', [CategoryController::class, 'show'])->name('get-category');

Route::view('pages/about', 'frontend.pages.about')->name('page.about');

//Admin auth
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('login-form');
Route::post('admin/login', [AuthController::class, 'login'])->name('login');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');


//static pages
Route::get('admin/pages', [PagesController::class, 'index'])->name('admin/pages');
Route::match(['get', 'post'],'admin/pages/add' ,  [PagesController::class, 'add'])->name('admin/pages/add');
Route::match(['get', 'post'],'admin/edit-page/{id}' ,  [PagesController::class, 'update']);
Route::get('admin/delete-page/{id}', [PagesController::class, 'delete']);

//contact us page
Route::match(['get', 'post'],'admin/contact', [ContactController::class, 'update'])->name('admin/contact');

// get contact list of users from enquiry form
Route::get('admin/contact-list', [ContactListController::class, 'index'])->name('admin/contact-list');
