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
Route::post('product-knowledge-category','ProductKnowledgeCategoriesController@create')->name('api.productKnowledgeCategories.create');
Route::put('product-knowledge-category/{id}','ProductKnowledgeCategoriesController@update')->name('api.productKnowledgeCategories.update');
Route::delete('product-knowledge-category/{id}','ProductKnowledgeCategoriesController@delete')->name('api.productKnowledgeCategories.delete');

// technical problem categories
Route::get('technical-problem-categories','TechnicalProblemCategoriesController@index')->name('api.technicalProblemCategories.index');
Route::get('technical-problem-category/{id}','TechnicalProblemCategoriesController@view')->name('api.technicalProblemCategories.view');
Route::post('technical-problem-category','TechnicalProblemCategoriesController@create')->name('api.technicalProblemCategories.create');
Route::put('technical-problem-category/{id}','TechnicalProblemCategoriesController@update')->name('api.technicalProblemCategories.update');
Route::delete('technical-problem-category/{id}','TechnicalProblemCategoriesController@delete')->name('api.technicalProblemCategories.delete');

// technology knowledge categories
Route::get('technology-knowledge-categories','TechnologyKnowledgeCategoriesController@index')->name('api.technologyKnowledgeCategories.index');
Route::get('technology-knowledge-category/{id}','TechnologyKnowledgeCategoriesController@view')->name('api.technologyKnowledgeCategories.view');
Route::post('technology-knowledge-category','TechnologyKnowledgeCategoriesController@create')->name('api.technologyKnowledgeCategories.create');
Route::put('technology-knowledge-category/{id}','TechnologyKnowledgeCategoriesController@update')->name('api.technologyKnowledgeCategories.update');
Route::delete('technology-knowledge-category/{id}','TechnologyKnowledgeCategoriesController@delete')->name('api.technologyKnowledgeCategories.delete');

Route::get('product-knowledges','ProductKnowladgeController@index')->name('api.ProductKnowladgeController.index');
Route::get('product-knowledge/{id}','ProductKnowladgeController@view')->name('api.ProductKnowladgeController.view');
Route::post('product-knowledge','ProductKnowladgeController@create')->name('api.ProductKnowladgeController.create');
Route::put('product-knowledge/{id}','ProductKnowladgeController@update')->name('api.ProductKnowladgeController.update');
Route::delete('product-knowledge/{id}','ProductKnowladgeController@delete')->name('api.ProductKnowladgeController.delete');

Route::get('technology-knowledges','TechnologyKnowledgeController@index')->name('api.TechnologyKnowledgeController.index');
Route::get('technology-knowledge/{id}','TechnologyKnowledgeController@view')->name('api.TechnologyKnowledgeController.view');
Route::post('technology-knowledge','TechnologyKnowledgeController@create')->name('api.TechnologyKnowledgeController.create');
Route::put('technology-knowledge/{id}','TechnologyKnowledgeController@update')->name('api.TechnologyKnowledgeController.update');
Route::delete('technology-knowledge/{id}','TechnologyKnowledgeController@delete')->name('api.TechnologyKnowledgeController.delete');

Route::get('technical-knowledges','TechnicalKnowledgeController@index')->name('api.TechnicalKnowledgeController.index');
Route::get('technical-knowledge/{id}','TechnicalKnowledgeController@view')->name('api.TechnicalKnowledgeController.view');
Route::post('technical-knowledge','TechnicalKnowledgeController@create')->name('api.TechnicalKnowledgeController.create');
Route::put('technical-knowledge/{id}','TechnicalKnowledgeController@update')->name('api.TechnicalKnowledgeController.update');
Route::delete('technical-knowledge/{id}','TechnicalKnowledgeController@delete')->name('api.TechnicalKnowledgeController.delete');

Route::get('transmisi-types','TransmisiTypeController@index')->name('api.TransmisiTypeController.index');
Route::get('transmisi-type/{id}','TransmisiTypeController@view')->name('api.TransmisiTypeController.view');
Route::post('transmisi-type','TransmisiTypeController@create')->name('api.TransmisiTypeController.create');
Route::put('transmisi-type/{id}','TransmisiTypeController@update')->name('api.TransmisiTypeController.update');
Route::delete('transmisi-type/{id}','TransmisiTypeController@delete')->name('api.TransmisiTypeController.delete');

Route::get('problem-components','ProblemComponentController@index')->name('api.ProblemComponentController.index');
Route::get('problem-component/{id}','ProblemComponentController@view')->name('api.ProblemComponentController.view');
Route::post('problem-component','ProblemComponentController@create')->name('api.ProblemComponentController.create');
Route::put('problem-component/{id}','ProblemComponentController@update')->name('api.ProblemComponentController.update');
Route::delete('problem-component/{id}','ProblemComponentController@delete')->name('api.ProblemComponentController.delete');

Route::get('road-conditions','RoadConditionController@index')->name('api.RoadConditionController.index');
Route::get('road-condition/{id}','RoadConditionController@view')->name('api.RoadConditionController.view');
Route::post('road-condition','RoadConditionController@create')->name('api.RoadConditionController.create');
Route::put('road-condition/{id}','RoadConditionController@update')->name('api.RoadConditionController.update');
Route::delete('road-condition/{id}','RoadConditionController@delete')->name('api.RoadConditionController.delete');
