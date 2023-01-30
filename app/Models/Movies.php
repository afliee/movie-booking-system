<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Movies extends Model {
    public string $table = 'movies';

    public array $fillable = [
        'name', 'title', 'release_date', 'close_date', 'description', 'duration', 'trailer_path', 'banner_path'
    ];

    public function getMoviePlaying() : array
    {
        $sql = "SELECT * FROM $this->table WHERE DATE(now()) BETWEEN DATE(release_date) AND DATE(close_date)";
        return $this->raw($sql);
    }

    public function getUpComingMovie() : array
    {
        $sql = "SELECT * FROM $this->table WHERE DATE(release_date) - DATE(now()) > 10";
        return $this->raw($sql);
    }

    public static function all() {
        $movie = new Movies();

        $sql = "SELECT * FROM $movie->table";

        return $movie->raw($sql);
    }

    // get movie from id
    public static function getMovieFromId($id) {
        $movie = new Movies();

        $sql = "SELECT * FROM $movie->table WHERE id = $id";

        return $movie->raw($sql);
    }

    // get categories from movie id
    public function getCategories() {
        // get categories from movie id by where method
        $movieCategory = (new MovieCategory())->where('movie_id', $this->id)->get();
        $categories = [];
        foreach ($movieCategory as $key => $value) {
            $categories[] = (new Categories())->where('id', $value['category_id'])->get()[0];
        }
        
        return $categories;
    }

}