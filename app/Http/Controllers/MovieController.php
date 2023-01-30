<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\MovieCategory;
use App\Models\Movies;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Libraries\database_drivers\mysql\DB;
use Libraries\Request\Request;

class MovieController extends Controller
{

    public function index(Request $request)
    {
        $movie = new Movies();
        $movieCategory = new MovieCategory();
        $category = new Categories();
        $filter = $request->get('filter');
        if (isset($filter)) {
            $keys = explode(';', $filter);
        } else {
            $keys = ['time:playing'];
        }
        $filters = [];
        foreach ($keys as $key => $value) {
            $temp = explode(':', $value);
            $filters[$temp[0]] = $temp[1];
        }
        $sql = "SELECT 
                    *
                FROM
                    $movie->table 
                    JOIN $movieCategory->table ON $movie->table.id = $movieCategory->table.movie_id 
                    JOIN $category->table ON $category->table.id = $movieCategory->table.category_id
        ";
        if (!empty($filters['type'])) {
            $sql .= " AND type = '" . $filters['type'] . "'";
        }
        if (!empty($filters['type']) && isset($filters['time'])) {
            $sql .= ' AND ';
        }
        if (isset($filters['time']) && $filters['time'] == 'upcoming') {
            $sql .= 'AND DATE(release_date) - DATE(now()) > 10';
        }
        if (isset($filters['time']) && $filters['time'] == 'playing') {
            $sql .= 'AND DATE(now()) BETWEEN DATE(release_date) AND DATE(close_date)';
        }
        $movies = (new DB)->raw($sql);
        return view('movie.index', [
            'movies' => $movies,
            'time' => ucfirst($filters['time'])
        ]);

    }

    public function show(Request $request)
    {
        $db = new DB();
        $key = explode('_', $request->detail)[1];
        $ids = explode('.', $key);
        $movieId = $ids[0];
        $categoryId = $ids[1];
        $movie = new Movies();

        $sql = "
            SELECT
                *
            FROM 
                movies 
                JOIN movie_category ON movies.id = movie_category.movie_id
                JOIN categories ON movie_category.category_id = categories.id
            WHERE 
                movies.id = $movieId 
                AND movie_category.category_id = $categoryId
        ";
        $data = $db->raw($sql)[0];
        $period = period($data['release_date'], $data['close_date']);

        $sql = "
            SELECT 
                *
            FROM
                movies 
                JOIN movie_category ON movies.id = movie_category.movie_id 
                JOIN categories ON categories.id = movie_category.category_id
            WHERE 
                movies.id = $movieId AND 
                movie_category.category_id <> $categoryId
        ";
        $relationMovie = $db->raw($sql);
        if (empty($relationMovie)) {
            $sql = "
                SELECT 
                    *
                FROM
                    movies 
                    JOIN movie_category ON movies.id = movie_category.movie_id 
                    JOIN categories ON categories.id = movie_category.category_id
                WHERE 
                    movies.id <> $movieId AND 
                    movie_category.category_id <> $categoryId
            ";
            $relationMovie = $db->raw($sql);
        }
        if (!empty($data)) {
            return view('movie.detail', [
                'movie_id' => "<input type='hidden' name='movie_id' value='$movieId' id='movie_id' class='movie_id'>",
                'category_id' => "<input type='hidden' name='category_id' value='$categoryId' class='category_id'>",
                'data' => $data,
                'period' => $period,
                'movieRelation' => $relationMovie
            ]);
        } else {
            abort('404');
        }
    }

    public function getPremieres(Request $request)
    {
        session()->put('premier_date', $request->get('premier_date'));
        $moviesShowtime = $this->getMovieShowTimes($request->get('movie_id'), $request->get('category_id'), $request->get('premier_date'));
        response()->json([
            'data' => $moviesShowtime,
            'premier_date' => $request->get('premier_date')
        ]);
    }

    private function getMovieShowTimes($movieId, $categoryId, $showtime_date): array
    {
        $res = [];
        $db = new DB();

        $showtime_date = Carbon::createFromFormat('d/m/Y', $showtime_date)->format('d-m-Y');

        $sql = "SELECT
                    *
                FROM
                    movies
                    JOIN movie_category ON movie_category.movie_id = movies.id
                WHERE
                     movie_category.movie_id = $movieId AND
                     movie_category.category_id = $categoryId
        ";
        $movie = $db->raw($sql);

        $sql = "SELECT 
                    *
                FROM
                    movies 
                    JOIN tickets ON movies.id = tickets.movie_id 
                WHERE tickets.id NOT IN (SELECT ticket_id FROM invoice_ticket) 
                    AND movie_id = $movieId
        ";

        $premiers = $db->raw($sql);
        $movie = array_pop($movie);
        $premieresDate = $this->getPremieresList($premiers, $movie['release_date'], $movie['close_date']);
        foreach ($premieresDate as $date) {
            $temp = Carbon::parse($date);
            $date = $temp->format('d-m-Y');
            if (Carbon::parse($temp->format('d-m-Y'))->eq($showtime_date)) {
                $time = $temp->format('H:i');
                $date = $temp->format('d-m-Y');
                $res[] = $time;
            }
        }
        return $res;
    }

    private function getPremieresList($premieres, $start, $end): array
    {
        $res = [];
        $start = Carbon::parse($start)->format('d-m-Y H:i:s');
        $end = Carbon::parse($end)->format('d-m-Y H:i:s');
        foreach ($premieres as $premier) {
            $premiered = Carbon::parse($premier['premiered_at'])->format('d-m-Y H:i:s');
            if (Carbon::parse($premiered)->between($start, $end)) {
                if (!in_array($premiered, $res, true)) {
                    $res[] = $premiered;
                }
            }
        }
        return $res;
    }
}