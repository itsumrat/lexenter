<?php

use Illuminate\Support\Facades\Route;

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

Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return "All is cleared";
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return "Cache is Config";
});

Route::get('/key-generate', function() {
    Artisan::call('key:generate');
    return "key is generated";
});


Route::get('/', function () {
    return redirect()->route('advancedsearch.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'], function(){

    	// Dashboard
//	Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        //Context
    Route::get('contextlist', 'ContextController@index')->name('context.index');
    Route::get('context/create', 'ContextController@create')->name('context.create');
    Route::get('/getCtitle/{id}', 'ContextController@getCtitle');
    Route::get('/getEtitle/{id}', 'ContextController@getEtitle');
    Route::post('context/create', 'ContextController@store')->name('context.store');
    //Route::get('/deleteContext/{id}', 'ContextController@deleteContext');
    Route::get('add-term/{id}', 'ContextController@addTermContext')->name('addTermContext');
    Route::post('addTerm', 'ContextController@addTerm')->name('addTerm');
    Route::get('editcontext/{id}', 'ContextController@editcontext')->name('editcontext');
    Route::post('editcontext', 'ContextController@posteditcontext')->name('posteditcontext');
    Route::get('viewmore/{id}', 'ContextController@viewmore')->name('viewmore');

    Route::post('/deleteContext/{id}', 'ContextController@deleteContext')->name('deleteContext');

        //Article
    Route::get('articlelist', 'ArticleController@index')->name('article.index');
    Route::get('article/{id}/view', 'ArticleController@viewDetails')->name('viewArticle');
    Route::get('article/create', 'ArticleController@create')->name('article.create');
    Route::get('article/edit/{id}', 'ArticleController@edit')->name('article.edit');
    Route::post('article/update', 'ArticleController@update')->name('article.update');

    Route::post('article/save', 'ArticleController@store')->name('article.store');
    Route::delete('article/delete/{id}', 'ArticleController@destroy')->name('article.destroy');;
    //Batch import
    Route::post('import', 'ArticleController@import')->name('import');


       //Bookmark


    Route::post('bookmark/save', 'ArticleBookmarkController@store');
    Route::post('cbookmark/save', 'ContextBookmarkController@store');
    Route::get('bookmarks', 'ArticleBookmarkController@index')->name('bookmark.index');
    Route::post('/deleteArtBookmark/{id}', 'ArticleBookmarkController@destroy')->name('deleteArtBookmark');
    Route::post('/deletecONBookmark/{id}', 'ArticleBookmarkController@contextDestroy')->name('deleteConBookmark');



        //Term
    Route::get('termlist', 'TermController@index')->name('term.index');
    Route::get('term/create', 'TermController@create')->name('term.create');
    Route::post('post-term', 'TermController@storeTerm')->name('term.store');
    Route::get('edit-term/{id}', 'TermController@editTerm')->name('editTerm');
    Route::post('edit-term', 'TermController@updateTerm')->name('term.update');
    Route::get('/deleteTerm/{id}', 'TermController@deleteTerm');
    Route::post('/deleteTerm/{id}', 'TermController@deleteTerm')->name('deleteTerm');
    Route::get('/term-details/{id}', 'TermController@termDetails')->name('termDetails');
    
        //Search
    Route::get('advancedsearch', 'AdvnacedSearchController@index')->name('advancedsearch.index');
    Route::get('advancedSearchp', 'AdvnacedSearchController@advancedSearch');
    Route::get('term-search', 'AdvnacedSearchController@termSearch')->name('termsearch.index');
    Route::get('context-search', 'AdvnacedSearchController@contextSearch')->name('contextsearch.index');
    Route::get('search-history', 'AdvnacedSearchController@searchHistory')->name('search.history');
    
    Route::get('advancedSearchContext', 'AdvnacedSearchController@advancedSearchContext');
    Route::get('showmoreContext/{id}', 'AdvnacedSearchController@showmoreContext'); 
    
    Route::get('advancedSearchTerm', 'AdvnacedSearchController@advancedSearchTerm');
    Route::get('showmoreTerm/{id}', 'AdvnacedSearchController@showmoreTerm');

    //Profile
    Route::get('profile', 'UserProfile@edit')->name('user.profile');
    Route::post('profile/save', 'UserProfile@update')->name('user.profileUpdate');
    //Password
    Route::get('changePassword', 'PasswordController@index')->name('password.index');
    Route::post('changePassword/update', 'PasswordController@store')->name('password.change');


    Route::group(['middleware' => 'admin'], function () {
            //Term
    Route::get('users', 'UserController@index')->name('user.index');
    Route::post('user/create', 'UserController@store')->name('user.create');
    });


});

