<?php

//Route::get('/', function(){
//    return redirect('https://www.agh.com.pk/index.php/index');
//});

Route::get('/', 'PageController@index');

Route::get('/index', 'PageController@index');

Route::get('/glasses', 'PageController@glasses');

Route::get('/mirrors', 'PageController@mirrors');

Route::get('/contact_us', 'PageController@contact_us');

Route::get('/do_contact', 'PageController@do_contact');

?>