<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include __DIR__.'/admin_api.php';








// USER LOGIN REGISTER
Route::post('/registration', 'UserController@register');
Route::post('/signin', 'UserController@login');

// END USER LOGIN REGISTER
















Route::middleware(['auth:api'])->group(function() {






// GET PLANS
Route::get('/get-plans', 'UserPlanController@getPlans');
Route::get('/get-current-plan', 'UserPlanController@getCurrentPlan');

// END GET PLANS


// UPDATE PLAN
Route::post('/get-plan-update', 'UserPlanController@updated');

// END UPDATE PLAN

// TASKS

Route::post('/get-tasks', 'UserTaskController@getTasks');
Route::post('/submit-task', 'UserTaskController@submitTask');


Route::get('/get-submitted-tasks', 'UserTaskController@getSubmittedTasks');



// END TASKS

Route::get('/get-promotion-images', 'PromotionImageController@getImages');






Route::get('/winner-generate', 'WinnerController@generate');
Route::get('/tasks-history', 'UserTaskController@getHistory');









//GET USDT ADDRESS

    Route::get('/get-usdt-address', 'UserUsdtAddressController@get');


//    Send Payment


    Route::post('/send-payment', 'UserPaymentController@send');


//     TRANSACTION HISTORY
    Route::get('/get-transaction-history', 'UserTransactionHistoryController@getHistory');





     Route::get('/get-user-balance', 'UserBalanceController@get');




     Route::post('/request-withdrawal', 'WithdrawalController@requested');



     Route::get('/all-history', 'AllHistoryController@get');
     Route::get('/get-countries', 'CountryController@getAll');


     Route::resource("/get-video-url", 'UserVideoApiController');


     Route::resource("/get-whatsapp-url", 'UserWhatsappController');
     Route::resource("/get-guide-api", 'UserGuideApiController');
     Route::resource("/get-download-api", 'UserDownloadApiController');
     Route::resource("/get-countries", 'UserCountryController');













});



//RESET PASSWORD
Route::post('/reset-password', 'UserMailController@reset');
//Route::post('/user-verify-code', 'UserMailController@verify');
Route::post('/user-verify-code', 'UserMailController@changPassword');


