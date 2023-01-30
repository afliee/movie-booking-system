<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Str;
use Libraries\Request\Request;

return [
    'GET,/' => [HomeController::class, 'index'],
    'POST,/payment' => [TicketController::class, 'payment'],
    'movie' => [
        'GET,/' => [MovieController::class, 'index'],
        'GET,/{detail}' => [MovieController::class, 'show'],
        'GET,/booking' => [TicketController::class, 'index'],
        'POST,/booking' => [TicketController::class, 'index'],
    ],
    'auth' => [
        'GET,/' => [AuthController::class, 'index'],
        'POST,/verify' => [AuthController::class, 'verify'],
        'GET,/login' => [AuthController::class, 'index'],
        'POST,/process_login' => [AuthController::class, 'process_login'],
        'GET,/register' => [AuthController::class, 'register'],
        'GET,/logout' => [AuthController::class, 'logout'],
        'POST,/process_register' => [AuthController::class, 'process_register']
    ],
    'api' => [
        'GET,/test' => [MovieController::class, 'test'],
        'POST,/send-email' => [TicketController::class, 'sentEmail'],
        'POST,/'.Str::slug(Str::snake('getPremieres')) => [MovieController::class, 'getPremieres'],
        'GET,/'.Str::slug(Str::snake('getFood')) => [ProductController::class, 'getFood'],
        'GET,/'.Str::slug(Str::snake('getCombo')) => [ProductController::class, 'getCombo']
    ],
    'GET,/contact' => [HomeController::class, 'contact'],
    'admin' => [
        'GET,/' => [AdminController::class, 'index'],
        'GET,/dashboard' => [AdminController::class, 'index'],
        'GET,/movie' => [AdminMovieController::class, 'index'],
        'GET,/movie/create' => [AdminMovieController::class, 'create'],
        'POST,/movie/store' => [AdminMovieController::class, 'store'],
        'GET,/movie/detail/{id}' => [AdminMovieController::class, 'detail'],
        'POST,/movie/update/{id}' => [AdminMovieController::class, 'update'],
        'GET,/movie/delete/{id}' => [AdminMovieController::class, 'delete'],
        'GET,/product' => [AdminProductController::class, 'index'],
        'GET,/product/create' => [AdminProductController::class, 'create'],
        'POST,/product/store' => [AdminProductController::class, 'store'],
        'GET,/product/detail/{id}' => [AdminProductController::class, 'detail'],
        'POST,/product/update/{id}' => [AdminProductController::class, 'update'],
        'GET,/product/delete/{id}' => [AdminProductController::class, 'delete'],
        'GET,/category' => [AdminCategoryController::class, 'index'],
        'GET,/category/create' => [AdminCategoryController::class, 'create'],
        'POST,/category/store' => [AdminCategoryController::class, 'store'],
        'GET,/category/detail/{id}' => [AdminCategoryController::class, 'detail'],
        'POST,/category/update/{id}' => [AdminCategoryController::class, 'update'],
        'GET,/category/delete/{id}' => [AdminCategoryController::class, 'delete'],
    ],
];