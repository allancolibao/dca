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

/**
 * Landing page
 * 
 * 
 */ 
Route::get('/', function () {
    return view('index');
});


/**
 * Auth routes
 * 
 * 
 */ 
Auth::routes();


/**
 * Home page 
 * 
 * 
 */ 
Route::get('/home', 'HomeController@index')->name('home');


/**
 * Handle participants information
 * 
 * 
 */ 
Route::get('/assent', 'ParticipantController@assent')->name('assent');
Route::get('/add-participant', 'ParticipantController@show')->name('add.participant');
Route::get('/participant-edit-modal/{id}', 'ParticipantController@edit')->name('participant.edit.modal');
Route::get('/participant-delete-modal/{id}', 'ParticipantController@showDelete')->name('participant.delete.modal');
Route::get('/deleted-participants', 'ParticipantController@showDeletedParticipant')->name('deleted.participants');
Route::get('/view-participant/{id}/{fullname}/{sex}/{age}', 'ParticipantController@view')->name('view.participant');

Route::post('/insert-participant-data', 'ParticipantController@insert')->name('insert.participant.data');
Route::post('/update-participant-data/{id}', 'ParticipantController@update')->name('update.participant.data');
Route::post('/restore-participant-data/{id}', 'ParticipantController@restoreDeletedParticipant')->name('restore.participant.data');

Route::delete('/participant-delete-data/{id}', 'ParticipantController@destroy')->name('participant.delete.data');


/**
 * Handle screening form
 * 
 * 
 */ 
Route::get('/view-screening/{id}/{fullname}/{sex}/{age}', 'ScreeningController@index')->name('view.screening');

Route::post('/insert-screening-data/{id}', 'ScreeningController@insert')->name('insert.screening.data');
Route::post('/update-screening-data/{id}', 'ScreeningController@update')->name('update.screening.data');


/**
 * Handle case-report form
 * 
 * 
 */ 
Route::get('/view-case-report/{id}/{fullname}/{sex}/{age}', 'CaseReportController@index')->name('view.case.report');

Route::post('/insert-case-report-data/{id}', 'CaseReportController@insert')->name('insert.case.report.data');
Route::post('/update-case-report-data/{id}', 'CaseReportController@update')->name('update.case.report.data');


/**
 * Handle food record
 * 
 * 
 */ 
Route::get('/cycle-menu', 'FoodRecordController@menu')->name('cycle.menu');
Route::get('/view-record/{id}/{fullname}/{sex}/{age}', 'FoodRecordController@index')->name('view.record');
Route::get('/get-record-date/{id}/{fullname}/{sex}/{age}/{date}', 'FoodRecordController@getUpdateRecordDate')->name('get.record.date');
Route::get('/encode-record/{id}/{fullname}/{sex}/{age}/{date}', 'FoodRecordController@encode')->name('encode.record');
Route::get('/get-record/{id}/{fullname}/{sex}/{age}/{date}', 'FoodRecordController@getRecord')->name('get.record');

Route::post('/insert-record-date/{id}/{fullname}/{sex}/{age}', 'FoodRecordController@insertRecordDate')->name('insert.record.date');
Route::post('/insert-record-header/{id}/{fullname}/{sex}/{age}/{date}', 'FoodRecordController@updateRecordDate')->name('insert.record.header');
Route::post('insert-record-data/{id}/{fullname}/{sex}/{age}/{date}' ,'FoodRecordController@insertRecordData')->name('insert.record.data');
Route::post('update-record-data/{id}/{fullname}/{sex}/{age}/{date}' ,'FoodRecordController@updateRecordData')->name('update.record.data');
Route::post('update-record-header/{id}/{fullname}/{sex}/{age}/{date}' ,'FoodRecordController@updateRecordHeader')->name('update.record.header');


/**
 * Handle monitoring page
 * 
 * 
 */ 
Route::get('/encode-daily-monitoring/{id}/{fullname}/{sex}/{age}', 'DailyMonitoringController@index')->name('encode.daily.monitoring');
Route::get('/view-daily-monitoring/{id}/{fullname}/{sex}/{age}', 'DailyMonitoringController@view')->name('view.daily.monitoring');
Route::get('/edit-daily-monitoring/{id}/{fullname}/{sex}/{age}/{day}', 'DailyMonitoringController@edit')->name('edit.daily.monitoring');

Route::post('/insert-monitoring-data/{id}', 'DailyMonitoringController@insert')->name('insert.monitoring.data');
Route::post('/update-monitoring-data/{id}/{day}' ,'DailyMonitoringController@update')->name('update.monitoring.data');
Route::post('/insert-monitoring-header/{id}', 'DailyMonitoringController@insertHeader')->name('insert.monitoring.header');
Route::post('/update-monitoring-header/{id}', 'DailyMonitoringController@updateHeader')->name('update.monitoring.header');


/**
 * Adverse event form
 * 
 * 
 */ 
Route::get('/get-adverse-event/{id}/{fullname}/{sex}/{age}', 'AdverseEventController@index')->name('get.adverse.event');

Route::post('/insert-adverse-data/{id}', 'AdverseEventController@insert')->name('insert.adverse.data');
Route::post('/update-adverse-data/{id}' ,'AdverseEventController@update')->name('update.adverse.data');


/**
 * Data Transmission
 * 
 * 
 * 
 */
Route::get('/transmit', 'DataTransmissionController@index')->name('transmit');
Route::get('/transmission/{id}','DataTransmissionController@transmission')->name('send.data');
Route::get('/send-all','DataTransmissionController@sendAll')->name('send.all.data');


/**
 * Backup Data
 * 
 * 
 * 
 */
Route::get('/backup','BackupDataController@backup')->name('backup');


/**
 * Get Data
 * 
 * 
 * 
 */
Route::get('/get-data','GetDataController@index')->name('get.data');
Route::get('/save-data/{id}','GetDataController@saveData')->name('save.data');