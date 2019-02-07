<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Articles\ArticlesRepository;


// no elasticsearch, just show the Collection
Route::get('/articles', function () {
    return view('articles.index', [
        'articles' => App\Article::all(),
    ]);
});

Route::get('/search', function (ArticlesRepository $repository) {
    $articles = $repository->search((string) request('q'));

    return view('articles.index', [
        'articles' => $articles,
    ]);
});


Route::get('/article/insert', function() {
    $params = [
        'title' => "my title",
        'body' => "description goes here",
        'tags' => ['php']
    ];
    $article = new App\Article($params);
    $article->save();


    return response()->json("Article inserted");
});
