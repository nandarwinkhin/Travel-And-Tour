<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'WelcomeController@index');


Route::get('/welcome','WelcomeController@index');
Route::get('/booking/{id}/trip','BookingController@index');
Route::post('/booking/{id}/trip','BookingController@bookTrip');
Route::get('/bookingList','BookingController@bookingList');

Route::get('/welcome/{id}','WelcomeController@afterLogin');
//Route::get('/welcome','WelcomeController@index');

//Route::get('/Search','SearchController@index');
// Route::get('/Search','SearchController@search');

Route::get('/login','Auth\LoginController@showLogin');
Route::post('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout');

Route::get('/profile','ProfileController@showProfile');
Route::post('/profile','ProfileController@updateProfile');

Route::get('/userProfile/{id}','ProfileController@showOthersProfile');

Route::get('/comments/{commented_on}/{commentable_id}','CommentController@showComment');
Route::post('/comments/{commented_on}/{commentable_id}','CommentController@storeComment');


Route::post('/userLoginApi','UserLoginController@login');//login api

Route::get('/register','Auth\RegisterController@showRegister');

Route::get('/UserRegister','UserRegisterController@index');
Route::post('/UserRegister','Auth\RegisterController@storeUser');

Route::get('/OrgRegister','OrgRegisterController@index');
Route::post('/OrgRegister','Auth\RegisterController@storeOrg');


//login

// Route::post('/login','Auth\LoginController@login');//for login

// Route::get('/home', 'HomeController@index');

// Route::get('/create_posts',function(){
//     return view('create_post');
// });
Route::get('/createPost', 'CreatePostController@imagesUpload');
// Route::post('/createPost','CreatePostController@createPost');
Route::post('/createPost', 'CreatePostController@createPost')->name('images.upload');

Route::get('/createTripPlan', 'CreateTripPlanController@imagesUpload');
Route::post('/createTripPlan', 'CreateTripPlanController@createTripPlan')->name('images.upload');









//API 
//api for user
Route::get('/userLogin','UserLoginController@index');
Route::post('/userLogin','UserLoginController@userLogin');//for user login

Route::post('/user','UserLoginController@createUser');//for creating user
Route::get('/user/{id}','UserLoginController@updateUser');//for updating user
Route::post('/user/{id}','UserLoginController@deleteUser');  // for deleting user
Route::get('/user','UserLoginController@selectUser');//for selecting user

//api for post

Route::post('/post','PostController@createPost');//for creating post
Route::get('/post/{id}','PostController@updatePost');//for updating post
Route::post('/post/{id}','PostController@deletePost');  // for deleting post
Route::get('/post','PostController@selectPost');//for selecting post

//api for trip plan
Route::post('/tripPlan','TripPlanController@createTripPlan');//for creating trip plan
Route::get('/tripPlan/{id}','TripPlanController@updateTripPlan');//for updating trip plan
Route::post('/tripPlan/{id}','TripPlanController@deleteTripPlan');  // for deleting trip plan
Route::get('/tripPlan','TripPlanController@selectTripPlan');//for selecting trip plan

//api for comment
Route::post('/comment','CommentController@createComment');//for creating comment
Route::get('/comment/{id}','CommentController@updateComment');//for updating comment
Route::post('/comment/{id}','CommentController@deleteComment');  // for deleting comment
Route::get('/comment','CommentController@selectComment');//for selecting comment

//api for booking
Route::post('/booking','BookingController@createBooking');//for creating booking
Route::get('/booking/{id}','BookingController@updateBooking');//for updating booking
Route::post('/booking/{id}','BookingController@deleteBooking');  // for deleting booking
Route::get('/booking','BookingController@selectBooking');//for selecting booking

//api for review
Route::post('/review','ReviewsController@createReview');//for creating review
Route::get('/review/{id}','ReviewsController@updateReview');//for updating review
Route::post('/review/{id}','ReviewsController@deleteReview');  // for deleting review
Route::get('/review','ReviewsController@selectReview');//for selecting review