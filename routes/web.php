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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/authors', ['uses' => 'AuthorController@index', 'as' => 'author.index']);
Route::get('/authors/add', ['uses' => 'AuthorController@add', 'as' => 'author.add']);
Route::post('/authors/save', ['uses' => 'AuthorController@save', 'as' => 'author.save']);
Route::get('/authors/edit/{id}', ['uses' => 'AuthorController@edit', 'as' => 'author.edit']);
Route::post('/authors/update/{id}', ['uses' => 'AuthorController@update', 'as' => 'author.update']);
Route::get('/authors/delete/{id}', ['uses' => 'AuthorController@delete', 'as' => 'author.delete']);
Route::put('/authors/search', ['uses' => 'AuthorController@search', 'as' => 'author.search']);

Route::get('/books', ['uses'=>'BookController@index', 'as'=>'book.index']);
Route::get('/books/add', ['uses'=>'BookController@add', 'as'=>'book.add']);
Route::post('/books/save', ['uses' => 'BookController@save', 'as' => 'book.save']);

Route::put('/books/search', ['uses' => 'BookController@search', 'as' => 'book.search']);