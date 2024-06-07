<?php

use Illuminate\Support\Facades\Route;

/*Route::get("/miurl", function(){
return view("welcome");
});  otra forma de enlace*/

Route::get('/', function () {
    return view('index');
});

//

Route::get('/{any}', function () {
    return view('index');
})->where('any','.*');
