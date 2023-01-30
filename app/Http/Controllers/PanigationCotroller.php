<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Libraries\database_drivers\mysql\DB;
use Libraries\Request\Request;


class PanigationCotroller extends Controller
{
    public function getData($limit = 6, $page = 1)
    {
        if ($limit == 'all') {
            return view('movie');
        }
    }
}