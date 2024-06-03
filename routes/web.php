<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/', [\App\Http\Controllers\PageDisplayController::class, 'home'])->name('frontend.home'); 
Route::get('{slug}', [\App\Http\Controllers\PageDisplayController::class, 'show'])->name('frontend.page');


// Route::group([
//     'prefix' => LaravelLocalization::setLocale(),
//     'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
// ], function () {
//     Route::get('news', function () {
//         return view('site.articles.index', [
//             'articles' => Article::published()->orderBy('created_at', 'desc')->get(),
//         ]);
//     })->name('articles');

//     Route::get('news/{article}', function (Article $article) { 
//         return view('site.articles.show', [
//             'article' => $article,
//         ]);
//     })->name('article'); 
// });

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    Route::get(LaravelLocalization::transRoute('routes.articles'), function () {
        return view('site.articles.index', [
            'articles' => Article::published()->orderBy('created_at', 'desc')->get(),
        ]);
    })->name('articles');
 
    Route::get(LaravelLocalization::transRoute('routes.article'), function (Article $article) { 
        return view('site.articles.show', [
            'article' => $article,
        ]);
    })->name('article');
});