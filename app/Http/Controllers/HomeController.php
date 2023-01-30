<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Post;
use Libraries\database_drivers\mysql\DB;
use Libraries\Request\Request;
use Libraries\Session\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $db = new DB();
        $sql = "SELECT *, categories.id AS category_id FROM movies 
                    JOIN movie_category ON movies.id = movie_category.movie_id 
                    JOIN categories ON categories.id = movie_category.category_id 
                    AND DATE(now()) BETWEEN DATE(release_date) AND DATE(close_date)";
        $movies = $db->raw($sql);

        if (!empty(session()->all()) && session()->get('is_login')) {
            $name = session()->get('name');
            $message = session()->get('message');
            return view('home', [
                'name' => $name,
                'message' => $message,
                'movies' => $movies
            ]);
        }
        return view('home', [
            'movies' => $movies
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

}