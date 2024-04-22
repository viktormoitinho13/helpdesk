<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;
use Livewire\Livewire;




Route::get('posts/create', CreatePost::class);
