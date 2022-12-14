<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// ADMIN LOGIN REGISTER


Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout');


Route::get('/send-mail', 'MailController@send');
Route::get('/verify-code', 'MailController@verifyCode');
Route::get('/change-password', 'MailController@changePassword');



// END ADMIN LOGIN REGISTER









// ADMIN CONTROLS

// USER CRUD

Route::get('/users', 'UserController@index');
Route::delete('/users/{id}', 'UserController@destroy');
Route::post('/users', 'UserController@store');

Route::get('/users/{id}/edit', 'UserController@show');
Route::post('/users/update/{id}', 'UserController@updateUserByAdmin');
Route::get('/user/details/{id}', 'UserDetailsController@getDetails');

// END USER CRUD





// PLAN CRUD
Route::resource('/plans', 'PlanController');
// END PLAN CRUD



//  TASK CRUD

Route::resource('/tasks', 'TaskController');
Route::get('/all-tasks', 'TaskController@getAllTasks');
Route::post('/tasks-update/{id}', 'TaskController@update');

Route::get('/tasks/acceptance/{id}', 'TaskController@acceptance');
Route::get('/tasks/rejection/{id}', 'TaskController@rejection');
Route::get('/tasks/restore/{id}', 'TaskController@restore');

//  END TASK CRUD




// END ADMIN CONTROLS



// PROMOTION IMAGES

Route::resource('/promotion-images', 'PromotionImageController');


Route::resource('/guid-api', 'GuidApiController');
Route::resource('/download-api', 'DownloadApiController');
Route::resource('/videos', 'VideoController');



// END PROMOTION IMAGES


// ADDRESS



Route::resource('/address', 'AddressController');

// WHATSAPP LINK

Route::resource('/whatsapp-link', 'WhatsappLinkController');


//TRANSACTIONS

Route::resource('/transactions', 'TransactionController');
Route::get('/transactions-approve/{id}', 'TransactionController@approve');
Route::get('/transactions-approve-withdrawal/{id}', 'TransactionController@approveWithdrawal');
Route::get('/transactions-reject/{id}', 'TransactionController@reject');


Route::resource('/countries', 'CountryController');
Route::post('/countries/get-updated', 'CountryController@getUpdated');


// ROOT CONTROLLER


Route::get('/root', 'RootController@index');
Route::get('/root-transactions', 'RootController@getTransactions');
Route::get('/root-transactions-withdrawal', 'RootController@getWithdrawalTransactions');










