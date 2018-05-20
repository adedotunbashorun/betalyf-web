<?php




/*
------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('website.index');
})->name('index');

Route::get('/immunization-schedule',["as"=>"schedule","uses" => 'ChildScheduleController@index']);
Route::get('/schedule',["as"=>"schedule.store","uses" => 'ChildScheduleController@store']);

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('login');

Route::get('/registration', ["as" => "register", "uses" => "UserController@index"]);
Route::get('/registration', ["as" => "register", "uses" => "HomeController@index"]);
Route::post('/register', ['as' => 'register.store', 'uses' => 'UserController@store']);
Route::get('/map', ['as' => 'map', 'uses' => 'HomeController@map']);
Route::get('/clinics', ['as' => 'clinics', 'uses' => 'HomeController@mapIndex']);
Route::get('/local', ["as"=>"clinic.locals", "uses"=>"HospitalController@Local"]);

Route::get('member-account-activation/{slug?}/confirmation={check?}', ['as'=>'confirmRegistration', 'uses'=>'UserController@activateAccount']);

Route::get('/logout', function () {
	auth()->logout();
	\Session::flash('success', 'Your have successfully logged out!');
	return redirect('/login');
})->name('logout');
Route::group(['middleware' => ['auth']], function () {
	Route::get('/dashboard', 'HomeController@index')->name('home');
	
	//-	-- ADMIN NOTIFICATIONS ---//
	Route::get('/dashboard-notify', ["as" => "dashboardNotify", "uses" => "HomeController@indexNotify"]);
	Route::get('/notifications', ["as" => "notifications", "uses" => "HomeController@notifications"]);
	Route::get('/read_notification/{id?}', ["as" => "read", "uses" => "HomeController@read"]);
	Route::get('/load-dispute', ["as" => "loadDispute", "uses" => "HomeController@loadDispute"]);
	Route::get('/load-activity-logs', ["as" => "loadActivityLogs", "uses" => "HomeController@loadActivityLogs"]);
	Route::get('/load-support', ["as" => "loadSupport", "uses" => "HomeController@loadSupport"]);
	Route::get('/load-chart', ["as" => "loadChart", "uses" => "HomeController@loadChart"]);
	Route::get('/load-new-members', ["as" => "loadMembers", "uses" => "HomeController@loadMembers"]);
	
	// 	--- PERMISSIONS ---//
	Route::group(['prefix' => 'permissions'], function () {
		Route::get('/', ["as"=>"permissions.index", "uses"=>"PermissionController@index"]);
		Route::post('/store',["as"=>"permissions.store",'uses'=> 'PermissionController@store']);
		Route::get('/show/{id?}', ["as"=>"permissions.show", "uses"=>"PermissionController@show"]);
		Route::post('/update',["as"=>"permissions.update",'uses'=> 'PermissionController@update']);
		Route::get('/delete/{id?}',["as"=>"permissions.destroy",'uses'=> 'PermissionController@destroy']);
		Route::get('/get-details', ["as"=>"permissions.editInfo", "uses"=>"PermissionController@getEditInfo"]);
	});

	// 	--- INFORMATION ---//
	Route::group(['prefix' => 'informations'], function () {
		Route::get('/', ["as"=>"informations.index", "uses"=>"InformationController@index"]);
		Route::post('/store',["as"=>"informations.store",'uses'=> 'InformationController@store']);
		Route::get('/show/{id?}', ["as"=>"informations.show", "uses"=>"InformationController@show"]);
		Route::post('/update',["as"=>"informations.update",'uses'=> 'InformationController@update']);
		Route::get('/delete/{id?}',["as"=>"informations.destroy",'uses'=> 'InformationController@destroy']);
		Route::get('/get-details', ["as"=>"informations.editInfo", "uses"=>"InformationController@getEditInfo"]);
	});
	
	// 	--- ROLES ---//
	Route::group(['prefix' => 'roles'], function () {
		Route::get('/', ["as" => "roles.index", "uses" => "RoleController@index"]);
		Route::post('/store', ["as" => "roles.store", 'uses' => 'RoleController@store']);
		Route::get('/show/{id?}', ["as" => "roles.show", "uses" => "RoleController@show"]);
		Route::post('/update', ["as" => "roles.update", 'uses' => 'RoleController@update']);
		Route::get('/delete/{id?}', ["as" => "roles.destroy", 'uses' => 'RoleController@destroy']);
		Route::get('/get-details', ["as" => "roles.editInfo", "uses" => "RoleController@getEditInfo"]);
		Route::post('roles_mass_destroy', ['uses' => 'RoleController@massDestroy', 'as' => 'roles.mass_destroy']);
	});
	
	// 	--- USERS ---//
	Route::group(['prefix' => 'users'], function () {
		Route::get('/', ["as" => "users.index", "uses" => "UserController@index"]);
		Route::post('/store', ["as" => "users.store", 'uses' => 'UserController@store']);
		Route::get('/show/{id?}', ["as" => "users.show", "uses" => "UserController@show"]);
		Route::post('/update', ["as" => "users.update", 'uses' => 'UserController@update']);
		Route::get('/delete/{id?}', ["as" => "users.destroy", 'uses' => 'UserController@destroy']);
		Route::get('/get-details', ["as" => "users.editInfo", "uses" => "UserController@getEditInfo"]);
		Route::get('/activate-user-account/{id?}', ["as"=>"users.activate", "uses"=>"UserController@activate"]);
		Route::get('/profile', ['as' => 'users.profile', 'uses' => 'UserController@profile']);
		Route::post('roles_mass_destroy', ['uses' => 'UserController@massDestroy', 'as' => 'users.mass_destroy']);
	});
	
	// 	--- ROLES ---//
	Route::group(['prefix' => 'beneficiaries'], function () {
		Route::get('/', ["as" => "beneficiaries.index", "uses" => "BeneficiaryController@index"]);
		Route::post('/store', ["as" => "beneficiaries.store", 'uses' => 'BeneficiaryController@store']);
		Route::get('/show/{id?}', ["as" => "beneficiaries.show", "uses" => "BeneficiaryController@show"]);
		Route::post('/update', ["as" => "beneficiaries.update", 'uses' => 'BeneficiaryController@update']);
		Route::get('/delete/{id?}', ["as" => "beneficiaries.destroy", 'uses' => 'BeneficiaryController@destroy']);
		Route::get('/get-details', ["as" => "beneficiaries.editInfo", "uses" => "BeneficiaryController@getEditInfo"]);
		Route::get('/show/{id?}', ["as" => "beneficiaries.show", "uses" => "BeneficiaryController@show"]);
	});
	
	// 	--- HOSPITAL CATEGORIES ---//
	Route::group(['prefix' => 'categories'], function () {
		Route::get('/', ["as"=>"categories.index", "uses"=>"HospitalCategoryController@index"]);
		Route::post('/store',["as"=>"categories.store",'uses'=> 'HospitalCategoryController@store']);
		Route::get('/show/{id?}', ["as"=>"categories.show", "uses"=>"HospitalCategoryController@show"]);
		Route::post('/update',["as"=>"categories.update",'uses'=> 'HospitalCategoryController@update']);
		Route::get('/delete/{id?}',["as"=>"categories.destroy",'uses'=> 'HospitalCategoryController@destroy']);
		Route::get('/get-details', ["as"=>"categories.editInfo", "uses"=>"HospitalCategoryController@getEditInfo"]);
    });
    
    // 	--- HOSPITALs ---//
	Route::group(['prefix' => 'hospitals'], function () {
		Route::get('/', ["as"=>"hospitals.index", "uses"=>"HospitalController@index"]);
		Route::post('/store',["as"=>"hospitals.store",'uses'=> 'HospitalController@store']);
		Route::get('/show/{id?}', ["as"=>"hospitals.show", "uses"=>"HospitalController@show"]);
		Route::post('/update',["as"=>"hospitals.update",'uses'=> 'HospitalController@update']);
		Route::get('/delete/{id?}',["as"=>"hospitals.destroy",'uses'=> 'HospitalController@destroy']);
        Route::get('/get-details', ["as"=>"hospitals.editInfo", "uses"=>"HospitalController@getEditInfo"]);
        Route::get('/local', ["as"=>"hospitals.locals", "uses"=>"HospitalController@Local"]);
	});

	//---- DISPUTES MANAGEMENT ----//
    Route::group(['prefix' => 'outbreak'], function () {
        Route::get('/',["as"=>"disputeIndex", "uses"=>"DisputeController@index"]);
        Route::get('/view/{slug?}',["as"=>"viewDispute", "uses"=>"DisputeController@show"]);
        Route::post('/create-dispute', ["as"=>"disputeAdd", "uses"=>"DisputeController@store"]);
		Route::post('/get-dispute', ["as"=>"getDispute", "uses"=>"DisputeController@getDisputes"]);
		Route::post('/reply-dispute', ["as"=>"replyDispute", "uses"=>"DisputeController@ReplyDispute"]);
		Route::post('/resolved-dispute', ["as"=>"resolveDispute", "uses"=>"DisputeController@ResolveDispute"]);
	});

	//-	--- ACTIVITY LOGS ---//	
	Route::group(['prefix' => 'logs'], function () {		
		Route::get('/', ["as"=>"activity.index", "uses"=>"ActivityLogController@index"]);		
	});	

	//---- SYSTEM SETTINGS MANAGEMENT ---//
    Route::group(['prefix' => 'settings'], function () {
        Route::group(['prefix' => 'mail'], function () {
            Route::get('/', ["as"=>"mailIndex", "uses"=>"SystemSettingsController@mailIndex"]);
            Route::post('/update-settings', ["as"=>"mailUpdate", "uses"=>"SystemSettingsController@store"]);
		});
		
		Route::group(['prefix' => 'general-settings'], function () {
            Route::get('/', ["as"=>"generalSettingIndex", "uses"=>"SystemSettingsController@generalSettingsIndex"]);
            Route::post('/update-general-settings', ["as"=>"generalSettingUpdate", "uses"=>"SystemSettingsController@storeGeneralSettings"]);
        });
    });
	
});
