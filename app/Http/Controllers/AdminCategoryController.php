<?php 
namespace App\Http\Controllers;

use App\Models\Categories;
use Libraries\Request\Request;

class AdminCategoryController extends Controller 
{
    public function index(Request $request) {
        $category = new Categories();
        $categories = $category->get();
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    // create a new category
    public function create(Request $request) {
        return view('admin.category.create');
    }

    // store the category in the database
    public function store(Request $request) {
        $category = new Categories();
        $category->type = $request->get('type');
        $category->save();
        return redirect()->route('admin/category');
    }

    // detail the category
    public function detail(Request $request) {
        $id = $request->id;
        $category = new Categories();
        $category = $category->find($id);
        if ($category == null) {
            abort(404);
        }
        return view('admin.category.detail', [
            'category' => $category
        ]);
    }

    // update the category in the database
    public function update(Request $request) {
        $id = $request->id;
        $category = (new Categories())->find($id);
        if ($category == null) {
            abort(404);
        }
        $category->type = $request->get('type');
        $category->save();
        return redirect()->route('admin/category');
    }

    // delete the category in the database
    public function delete(Request $request) {
        $id = $request->id;
        $category = (new Categories())->find($id);
        if ($category == null) {
            abort(404);
        }
        $category->delete();
        return redirect()->route('admin/category');
    }

}
