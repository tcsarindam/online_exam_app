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
Route::get('/admin', 'Admin@index');
Route::get('/admin/exam_category', 'Admin@exam_category');
Route::post('/admin/add_new_category', 'Admin@add_new_category');
Route::get('/admin/delete_category/{id}', 'Admin@delete_category');
Route::get('/admin/edit_category/{id}', 'Admin@edit_category');
Route::post('/admin/edit_new_category', 'Admin@edit_new_category');
Route::get('/admin/category_status/{id}', 'Admin@category_status');
Route::get('/admin/manage_exam', 'Admin@manage_exam');
Route::post('/admin/add_new_exam', 'Admin@add_new_exam');
Route::get('/admin/exam_status/{id}', 'Admin@exam_status');
Route::get('/admin/edit_exam/{id}', 'Admin@edit_exam');		
Route::post('/admin/edit_exam_sub', 'Admin@edit_exam_sub');
Route::get('/admin/delete_exam/{id}', 'Admin@delete_exam');
Route::get('/admin/manage_students', 'Admin@manage_students');
Route::post('/admin/add_new_student', 'Admin@add_new_student');
Route::get('/admin/student_status/{id}', 'Admin@student_status');
Route::get('/admin/delete_student/{id}', 'Admin@delete_student');
Route::get('/admin/edit_student/{id}', 'Admin@edit_student');	
Route::post('/admin/edit_student_sub', 'Admin@edit_student_sub');
Route::get('/admin/manage_portal', 'Admin@manage_portal');
Route::post('/admin/add_new_portal', 'Admin@add_new_portal');
Route::get('/admin/delete_portal/{id}', 'Admin@delete_portal');
Route::get('/admin/portal_status/{id}', 'Admin@portal_status');
Route::get('/admin/edit_portal/{id}', 'Admin@edit_portal');
Route::post('/admin/edit_portal_sub', 'Admin@edit_portal_sub');

//Portal Module

Route::get('/portal/signup', 'PortalController@portal_signup');
Route::post('/portal/signup_sub', 'PortalController@signup_sub');
Route::get('/portal/login', 'PortalController@login');
Route::post('/portal/login_sub', 'PortalController@login_sub');

Route::get('/portal/dashboard', 'PortalOperation@dashboard');
Route::get('/portal/logout', 'PortalOperation@logout');
Route::get('/portal/exam_form/{id}', 'PortalOperation@exam_form');

// Restrict back button in browser
Route::group(['middleware' => 'prevent-back-history'],function(){
  Auth::routes();
  Route::get('/portal/login', 'PortalController@login');
});

Route::post('/portal/exam_form_sub', 'PortalOperation@exam_form_sub');
Route::get('/portal/print/{id}', 'PortalOperation@print');
Route::get('/portal/update_form', 'PortalOperation@update_form');
Route::get('/portal/student_exam_info', 'PortalOperation@student_exam_info');
Route::get('/portal/printpdf/{id}', 'PortalOperation@printpdf');
Route::post('/portal/student_exam_info_edit', 'PortalOperation@student_exam_info_edit');
Route::get('/portal/printdata/{id}', 'PortalOperation@printdata');


// Student Account..
Route::get('/student/signup', 'StudentController@student_signup');
Route::post('/student/login_sub', 'StudentController@login_sub');
Route::get('/student/dashboard', 'StudentOperation@dashboard');
Route::get('/student/logout', 'StudentOperation@logout');
Route::get('/student/exam', 'StudentOperation@exam');
Route::get('/student/student_information/{id}', 'StudentOperation@student_information');


//Student Examination Module

Route::get('/student/join_exam/{id}', 'StudentOperation@join_exam');
Route::post('/student/submit_question', 'StudentOperation@submit_question');
Route::get('/student/show_result/{id}', 'StudentOperation@show_result');
Route::get('/student/model_answer/{id}', 'StudentOperation@model_answer');
Route::get('/student/all_exam_results', 'StudentOperation@all_exam_results');




// Add Question 
Route::get('/admin/add_question/{id}', 'Admin@add_question');
Route::post('/admin/add_new_question', 'Admin@add_new_question');
Route::get('/admin/exam_question_status/{id}', 'Admin@exam_question_status');
Route::get('/admin/delete_question/{id}', 'Admin@delete_question');
Route::get('/admin/edit_question/{id}', 'Admin@edit_question');
Route::post('/admin/edit_question_sub', 'Admin@edit_question_sub');

//Exam - student mapping
Route::get('/admin/add_exam_student/{id}', 'Admin@add_exam_student');
Route::post('/admin/add_exam_student_sub', 'Admin@add_exam_student_sub');
Route::get('/admin/all_assigned_exams', 'Admin@all_assigned_exams');

//Results

Route::get('/admin/all_student_results', 'Admin@all_student_results');
Route::get('/admin/search_result', 'Admin@search_result');
Route::post('/admin/search_result_sub/{id}', 'Admin@search_result_sub');









