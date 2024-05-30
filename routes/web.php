<?php

use App\Models\Exp\Admin;
use App\Models\Exp\AdminDetail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // Admin::create([
    //     'email' => 'admin2@example.com',
    //     'password' => bcrypt('12345678'),
    //     'name' => 'admin2',
    // ]);

    // AdminDetail::create([
    //     'admin_id' => 1,
    //     'title' => 'Admin Title1',
    //     'body' => 'Admin body1',
    // ]);


    // User::create([
    //     'email' => 'user3@example.com',
    //     'password' => bcrypt('12345678'),
    //     'name' => 'user3',
    // ]);

    // Post::create([
    //     'user_id' => 1,
    //     'title' => 'user title',
    //     'body' => 'user body',
    // ]);

    return [
        'admin' => Admin::whereHas('details')->with('details')->get(), //without Query Expression
        'user' => User::whereHas('posts')->with('posts')->get() //using references & Query Expression
    ];

});
