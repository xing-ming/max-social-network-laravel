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

// get index
Route::get('/', [
    'uses' => 'UserController@getIndex',
    'as' => 'signup'
]);

// users middleware
Route::group(['prefix' => 'users'], function () {
    // post signup
    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'users.signup'
    ]);

    // post signin
    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'users.signin'
    ]);

    // edit account
    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'user.account'
    ]);

    // update user account
    Route::post('/account-update', [
        'uses' => 'UserController@updateUserAccount',
        'as' => 'account.save'
    ]);

    // like
    Route::post('/like', 'PostController@postLikePost')->name('like');

    // get indexDashboard
    Route::get('/dashboard', [
        'uses' => 'PostController@indexDashboard',
        'as' => 'users.dashboard',
        'middleware' => 'auth'
    ]);

    // create post
    Route::post('/createpost', [
        'uses' => 'PostController@indexCreatePost',
        'as' => 'users.post',
        'middleware' => 'auth'
    ]);

    // get delete post
    Route::get('/post/delete/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete',
        'middleware' => 'auth'
    ]);

    // logout
    Route::get('/logout', [
        'uses' => 'PostController@getLogout',
        'as' => 'user.logout',
        'middleware' => 'auth'
    ]);

    // edit post
    Route::post('/edit', function (\Illuminate\Http\Request $request) {
        return response()->json(['message' => $request['body']]);
    })->name('edit');
});
//end users middleware
