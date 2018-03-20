<?php

/*
* 1) run db:seed to create 1000 user
* 2) first user is Admin, admin email: admin@admin.com & password: 123456
* 3) when admin user publish new article from profilepage(ProfileController) what will happen ? :-
	- store new article into DB
	- fetch last article inserted 
	- push new notification emails into Queue,
	- then send queue notification to (first 300 user) when finish them,
	  call the next 300 user and so on till finish all users
* 4) when want to fire emails run my task schedulre command "php artisan notify:emails"
	- this command start sending emails job to all users
*/

/* ------------------------ Start Posts Controller --------------------*/
// to show all posts in blog
Route::get('/','PostsController@index')->name('home');
// to show the Form
Route::get('/posts/create','PostsController@create');
// (POST route) to store data into DB
Route::post('/posts','PostsController@store');
//show specific post
Route::get('/posts/{post}','PostsController@show');
/* ------------------------ End Posts Controller --------------------*/


/* ------------------------ Start Comments Controller --------------------*/
Route::post('/posts/{post}/comments','CommentsController@store');
/* ------------------------ End Comments Controller --------------------*/

/* ------------------------ Start Auth Controller --------------------*/ 
Route::get('/register','registrationController@create');
Route::post('/register','registrationController@store');

Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store')->name('welcome');


Route::get('/logout','SessionController@destroy');

/* ------------------------ End Auth Controller --------------------*/


/* ------------------------ Start Tags Controller --------------------*/

Route::get('/posts/tags/{tag}','TagsController@index');

/* ------------------------ End Tags Controller -------------------*/

/* ------------------------ Start profile Controller -------------------*/
Route::get('/profile/{id}','ProfileController@index');
Route::post('/profile/posts','ProfileController@store');
// CRUD with posts from auth profile
Route::delete('/profile/posts/{id}/delete','ProfileController@destroy');
Route::get('profile/posts/{id}/edit','ProfileController@editPost');
Route::post('profile/posts/{id}/edit','ProfileController@updatePost');
/* ------------------------ Start profile Controller -------------------*/

/* ------------------------ Start setting Controller -------------------*/
Route::get('/setting/{id}','settingController@index');
Route::post('/setting/{id}','settingController@update');
/* ------------------------ End setting Controller -------------------*/
