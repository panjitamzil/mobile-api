<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// cars
Route::get('cars','CarController@index')->name('api.car.index');
Route::get('car/{id}','CarController@view')->name('api.car.view');
Route::post('car','CarController@create')->name('api.car.create');
Route::put('car/{id}','CarController@update')->name('api.car.update');
Route::delete('car/{id}','CarController@delete')->name('api.car.delete');

// product knowledge categories
Route::get('product-knowledge-categories','ProductKnowledgeCategoriesController@index')->name('api.productKnowledgeCategories.index');
Route::get('product-knowledge-category/{id}','ProductKnowledgeCategoriesController@view')->name('api.productKnowledgeCategories.view');

// technical problem categories
Route::get('technical-problem-categories','TechnicalProblemCategoriesController@index')->name('api.technicalProblemCategories.index');
Route::get('technical-problem-category/{id}','TechnicalProblemCategoriesController@view')->name('api.technicalProblemCategories.view');

// technology knowledge categories
Route::get('technology-knowledge-categories','TechnologyKnowledgeCategoriesController@index')->name('api.technologyKnowledgeCategories.index');
Route::get('technology-knowledge-category/{id}','TechnologyKnowledgeCategoriesController@view')->name('api.technologyKnowledgeCategories.view');

Route::get('problems','ProblemController@index')->name('api.problem.index');
Route::get('problem/{id}','ProblemController@view')->name('api.problem.view');
