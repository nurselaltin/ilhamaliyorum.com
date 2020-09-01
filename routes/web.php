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

/*
|--------------------------------------------------------------------------
| PANEL ROUTES
|--------------------------------------------------------------------------
*/






Route::get('/dashboard','DashboardController@index')->name('dashboard');
//CATEGORY ROUTES
Route::post('/add-category','DashboardController@addCategory')->name('add.category');

Route::get('/register','MemberController@index_register')->name('register.view');
Route::post('/register-member','MemberController@register')->name('register.member');
Route::get('/login-page','MemberController@loginPage')->name('login.page');
Route::post('/login-dashboard','MemberController@login')->name('login.dashboard');
Route::get('/login-out','MemberController@logout')->name('login.out');


//RESUME ROUTES
Route::get('/resume','ResumeController@index')->name('resume');
Route::get('/create-resume','ResumeController@create')->name('create.resume');
Route::post('/add-resume','ResumeController@add')->name('add.resume');
Route::get('/edit-writer','ResumeController@edit')->name('edit.writer');
Route::post('/update-writer','ResumeController@update')->name('update.writer');
Route::get('/resume-isActive',   'ResumeController@isActive')->name('resume.isActive');

//EDUCATION ROUTES
Route::get('/create-education','ResumeController@createEducation')->name('create.education');
Route::post('/add-education','ResumeController@addEducation')->name('add.education');
Route::get('/getDataEducation','ResumeController@getData')->name('education.getdata');
Route::post('/update-education','ResumeController@updateEducation')->name('update.education');
Route::get('/delete-education/{id}','ResumeController@deleteEducation')->name('delete.education');

//EXPERİENCE ROUTES
Route::get('/create-experience','ResumeController@createExperience')->name('create.experience');
Route::post('/add-experience','ResumeController@addExperience')->name('add.experience');
Route::get('/getDataExperience','ResumeController@getDataExperience')->name('experience.getdata');
Route::post('/update-experience','ResumeController@updateExperience')->name('update.experience');
Route::get('/delete-experience/{id}','ResumeController@deleteExperience')->name('delete.experience');

//PROJECTS ROUTES
Route::get('/create-project','ResumeController@createProject')->name('create.project');
Route::post('/add-project','ResumeController@addProject')->name('add.project');
Route::get('/getDataProject','ResumeController@getDataProject')->name('project.getdata');
Route::post('/update-project','ResumeController@updateProject')->name('update.project');
Route::get('/delete-project/{id}','ResumeController@deleteProject')->name('delete.project');

//REFERENCES ROUTES
Route::get('/create-references','ResumeController@createReference')->name('create.reference');
Route::post('/add-reference','ResumeController@addReference')->name('add.reference');
Route::get('/getDataReference','ResumeController@getDataReference')->name('reference.getdata');
Route::post('/update-reference','ResumeController@updateReference')->name('update.reference');
Route::get('/delete-reference/{id}','ResumeController@deleteReference')->name('delete.reference');

//BOOK ROUTES
Route::get('/book','BookController@index')->name('book');
Route::get('/create-book','BookController@create')->name('create.book');
Route::post('/add-book','BookController@add')->name('add.book');
Route::get('/edit-book/{id}','BookController@edit')->name('edit.book');
Route::post('/update-book/{id}','BookController@update')->name('update.book');
Route::get('/switch',   'BookController@switch')->name('switch.book');
Route::post('/delete-book','BookController@deleteBook')->name('delete.book');

//VIDEO ROUTES
Route::get('/video','VideoController@index')->name('video');
Route::get('/create-video','VideoController@create')->name('create.video');
Route::post('/add-video','VideoController@add')->name('add.video');
Route::get('/edit-video/{id}','VideoController@edit')->name('edit.video');
Route::post('/update-video/{id}','VideoController@update')->name('update.video');
Route::get('/switch-video',   'VideoController@switch')->name('switch.video');
Route::post('/delete-video','VideoController@deleteVideo')->name('delete.video');

//BLOG ROUTES
Route::get('/blog','BlogController@index')->name('blog');
Route::get('/create-blog','BlogController@create')->name('create.blog');
Route::post('/add-blog','BlogController@add')->name('add.blog');
Route::get('/edit-blog/{id}','BlogController@edit')->name('edit.blog');
Route::post('/update-blog/{id}','BlogController@update')->name('update.blog');
Route::get('/switch-blog',   'BlogController@switch')->name('switch.blog');
Route::post('/delete-blog','BlogController@deleteBlog')->name('delete.blog');





/*
|--------------------------------------------------------------------------
| SITE ROUTES
|--------------------------------------------------------------------------
*/
//HOME ROUTES
Route::get('/','SiteController\HomeController@index')->name('home');
//BLOG ROUTES
Route::get('/blogs','SiteController\BlogController@index')->name('blogs');
Route::get('/blog-post/{writer_id}/{id}','SiteController\BlogController@blogPost')->name('blog.post');

//BOOK ROUTES
Route::get('/books','SiteController\BookController@index')->name('books');
Route::get('/book-single/{book_title}/{id}','SiteController\BookController@bookSingle')->name('book.single');

//VİDEO ROUTES
Route::get('/videos','SiteController\VideoController@index')->name('videos');
