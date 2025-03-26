<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\About;
use App\Livewire\Frontend\Events;
use App\Livewire\Frontend\Campus;
use App\Livewire\Frontend\Results;
use App\Livewire\Frontend\Alumni;
use App\Livewire\Frontend\ContactUs;

Route::get('/home', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/events', Events::class)->name('events');
Route::get('/campus', Campus::class)->name('campus');
Route::get('/results', Results::class)->name('results');
Route::get('/alumni', Alumni::class)->name('alumni');
Route::get('/contact-us', ContactUs::class)->name('contact');
