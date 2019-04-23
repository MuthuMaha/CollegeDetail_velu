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

// use App\OmrModels\Employee;
// use App\Http\Resources\Employee as UserResource;
// Route::get('testapi',function(){
// 	return DB::table('t_student')->limit(20)->get();
// });
	/*OMR*/
	Route::post('userLogin', 'userController@login');
	// Route::post('uploadResults','AuthController@upload');
	// /*OMR Result Application*/
	// Route::post('resultLogin', 'OmrControllers\ResultController@login');
	Route::group([ 'middleware' => 'auth:token' ], function () 
	{	
		/*OMR Result Application*/	
		Route::get('departments','SubjectController@dep');
		Route::post('dashboardapi','SubjectController@dashboardapi');
		Route::post('attendancestudents','SubjectController@attendancestudents');
		Route::post('internalstudents','SubjectController@internalstudents');
		Route::post('attendance','SubjectController@attendance');
		Route::post('internalmark','SubjectController@internalmark');
		Route::post('viewattendance','SubjectController@viewattendance');
		Route::post('viewinternalmark','SubjectController@viewinternalmark');
		Route::post('storefile','SubjectController@store');
		Route::post('showfiles','SubjectController@show');
		Route::get('class_years/{dep_id}','SubjectController@years');
		
	});


Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('companies', 'CompaniesController', ['except' => ['create', 'edit']]);
});

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('employees', 'EmployeeController', ['except' => ['create', 'edit']]);
});

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('students', 'StudentController', ['except' => ['create', 'edit']]);
});
