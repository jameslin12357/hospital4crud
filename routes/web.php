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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('addresses', 'AddressController');
Route::resource('doctors', 'DoctorController');
Route::resource('genders', 'GenderController');
Route::resource('insurances', 'InsuranceController');
Route::resource('medications', 'MedicationController');
Route::resource('patients', 'PatientController');
Route::resource('procedures', 'ProcedureController');
Route::resource('visits', 'VisitController');
Route::resource('visitsmedications', 'VisitsmedicationsController');

