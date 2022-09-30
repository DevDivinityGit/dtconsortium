<?php
use Illuminate\Support\Facades\Route;





//$min = 1200;
//$limit = 46;
//$rand = rand(1, 46);
//
//
//$min +=  $rand*50;
//
//
//echo $min;





//Route::get('/clear', function() {
//       \Artisan::call('cache:clear');
// \Artisan::call('config:cache');
// \Artisan::call('view:clear');
//
// exit;
//
//
//})






//   \Artisan::call('cache:clear');
// \Artisan::call('config:cache');
// \Artisan::call('view:clear');




Route::get('{any}', 'AdminController@index')->where('any', '.*');
