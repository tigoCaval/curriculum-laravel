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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('cv')->namespace('Cv')->group(function(){
    
    Route::resources([
       'personal_informations' => 'PersonalInformationController',
       'contacts'=> 'ContactController',  
       'addresses'=> 'AddressController', 
       'documents'=> 'DocumentController',  
       'educations'=> 'EducationController',  
       'courses'=> 'CourseController',  
       'experiences'=> 'ExperienceController', 
       'languages'=> 'LanguageController',   
       'objectives'=> 'ObjectiveController',
       'summaries'=> 'SummaryController',         
    ]);

    Route::get('curriculum', 'CurriculumController@index')->name('cv'); 
 });