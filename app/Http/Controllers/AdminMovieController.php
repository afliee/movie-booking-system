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

class AdminMovieController extends Controller 
{
    public function index(Request $request) {

        // get movies and their categories
        $movies = (new Movies())->get();
        $tmp = [];
        foreach ($movies as $movie) {
            $id = $movie['id'];
            $movie = (new Movies())->find($id);
            $movie->categories = $movie->getCategories();
            $tmp[] = $movie;
        }
        $movies = $tmp;
        return view('admin.movie.index', [
            'movies' => $movies
        ]);
    }

    // database movie-booking
    // table movies
    // id, name, title, release_date, close_date, description,  duration, trailer path and banner path
    // create a new movie 
    public function create(Request $request) {
        $categories = (new Categories())->get();
        return view('admin.movie.create', [
            'categories' => $categories
        ]);
    }

    // store the movie in the database
    public function store(Request $request) {
        $movie = new Movies();
        $movie->name = $request->get('name');
        $movie->title = $request->get('title');
        $movie->release_date = $request->get('release_date');
        $movie->close_date = $request->get('close_date');
        $movie->description = $request->get('description');
        $movie->duration = $request->get('duration');
        $movie->trailer_path = $request->get('trailer_path');
        $movie->banner_path = $request->get('banner_path');
        $movie->save();
        foreach ($request->get('categories') as $key => $value) {
            $movieCategory = new MovieCategory();
            $movieCategory->movie_id = $movie->id;
            $movieCategory->category_id = $value;
            $movieCategory->save();
        }
        return redirect()->route('admin/movie');
    }

    // get detail of the movie
    public function detail(Request $request) {
        $id = $request->id;
        $movie = (new Movies())->find($id);
        if ($movie == null) {
            abort('404');
        }
        $movie->categories = $movie->getCategories();
        $categories = (new Categories())->get();

        return view('admin.movie.detail', [
            'movie' => $movie,
            'categories' => $categories
        ]);
    }
    
    // update the movie
    public function update(Request $request) {
        $id = $request->id;
        $movie = (new Movies())->find($id);
        if ($movie == null) {
            abort('404');
        }
        $movie->name = $request->get('name');
        $movie->title = $request->get('title');
        $movie->release_date = $request->get('release_date');
        $movie->close_date = $request->get('close_date');
        $movie->description = $request->get('description');
        $movie->duration = $request->get('duration');
        $movie->trailer_path = $request->get('trailer_path');
        $movie->banner_path = $request->get('banner_path');
        // update movie
        $movie->save();
        
        // delete all movie category
        (new MovieCategory())->where('movie_id', $id)->delete();
        // insert new movie category
        foreach ($request->get('categories') as $key => $value) {
            $movieCategory = new MovieCategory();
            $movieCategory->movie_id = $movie->id;
            $movieCategory->category_id = $value;
            $movieCategory->save();
        }
        return redirect()->route('admin/movie');
    }

    // delete the movie
    public function delete(Request $request) {
        $id = $request->id;
        $movie = (new Movies())->find($id);
        if ($movie == null) {
            abort('404');
        }
        $movie->delete();
        return redirect()->route('admin/movie');
    }

    
}

?>