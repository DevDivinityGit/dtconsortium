<?php
use Illuminate\Support\Facades\Route;


//
//Route::get('/hit-user', function() {
//
//      if(isAdmin($_SESSION['get_user_id'] ?? 0)) {
//
//
//          return "is admin";
//      }
//
//
//
//      return "thief";
//
//
//
//});
//








//
//
//Route::get('/user-id', function() {
//
//      return $_SESSION['get_user_id'];
//
//
//});
//
//


















//
//Route::get('/test', function() {
//
//
//           \Artisan::call('cache:clear');
//          \Artisan::call('config:cache');
//          \Artisan::call('view:clear');
//
// exit;
//
//
//});
//






//Route::get('/work', 'WorkController@workout');


//Route::get('/countries', function() {







//    return view('test', ['countries' => App\Country::all()]);






//    echo ini_get("upload_max_filesize");
//    echo "<br>";
//
//    echo ini_get("post_max_size");
//    echo "<br>";
//    echo ini_get("max_input_time");
//    echo "<br>";
//    echo ini_get("max_execution_time");
//
//    echo "<br>";
//    echo ini_get("memory_limit");



//});



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
