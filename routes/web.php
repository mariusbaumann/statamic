<?php

use Illuminate\Support\Facades\Route;

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/carcounter', function () {
    return view('test');
});

Route::get('/mini-test', fn() => view('livewire-mini-test'));