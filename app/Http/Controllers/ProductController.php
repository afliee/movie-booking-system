<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Libraries\database_drivers\mysql\DB;
use Libraries\Request\Request;
class ProductController extends Controller
{
    public function getFood():array
    {
        $product = new Products();
        $foods = $product->where('type', 'food')->get();
        response()->json([
            'foods'=> $foods
        ]);
    }

    public function getCombo() : array
    {
        $db = new DB();
        $sql = "SELECT products.*, combo_food.combo_id AS combo_id FROM combo_food
	                JOIN products ON combo_food.food_id = products.id";
        $combos = group($db->raw($sql), 'combo_id');
//        dd($combos);
        response()->json([
           'combos' => $combos
        ]);
    }
}