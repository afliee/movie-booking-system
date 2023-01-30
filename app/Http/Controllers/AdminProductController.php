<?php 
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\MovieCategory;
use App\Models\Movies;
use App\Models\Tickets;
use App\Models\Products;
use App\Models\ComboFood;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Libraries\database_drivers\mysql\DB;
use Libraries\Request\Request;

class AdminProductController extends Controller 
{
    public function index(Request $request) {
        $product = new Products();
        $products = $product->get();
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    // create a new product
    public function create(Request $request) {
        $foods = Products::getFood();
        return view('admin.product.create', [
            'foods' => $foods
        ]);
    }

    // store a new product
    public function store(Request $request) {
        $product = new Products();
        $product->type = $request->get('type');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');   
        $product->save();
        if ($request->get('type') == 'combo') {
            foreach ($request->get('foods') as $food) {
                $combo_food = new ComboFood();
                $combo_food->combo_id = $product->id;
                $combo_food->food_id = $food;
                $combo_food->save();
            }  
        }
        return redirect()->route('admin/product');
    }

    // show detail of a product
    public function detail(Request $request) {
        $id = $request->id;
        $product = (new Products())->find($id);
        if ($product == null) {
            abort(404);
        }
        if ($product->type == 'combo') {
            $product->foods = $product->getComboFoods();
            $foods = Products::getFood();
            return view('admin.product.detail', [
                'product' => $product,
                'foods' => $foods
            ]);
        }
        return view('admin.product.detail', [
            'product' => $product
        ]);
    }

    // update a product
    public function update(Request $request) {
        $id = $request->id;
        $product = (new Products())->find($id);
        if ($product == null) {
            abort(404);
        }
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');   
        $product->save();
        if ($request->get('type') == 'combo') {
            $combo_food = (new ComboFood())->where('combo_id', $product->id)->delete();
            foreach ($request->get('foods') as $food) {
                $combo_food = new ComboFood();
                $combo_food->combo_id = $product->id;
                $combo_food->food_id = $food;
                $combo_food->save();
            }  
        }
        return redirect()->route('admin/product');
    }

    // delete a product
    public function delete(Request $request) {
        $id = $request->id;
        $product = (new Products())->find($id);
        if ($product == null) {
            abort(404);
        }
        $product->delete();
        return redirect()->route('admin/product');
    }
}
?>