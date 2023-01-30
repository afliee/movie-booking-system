<?php

namespace App\Models;

use Libraries\database_drivers\Model;
class Products extends Model {
    public string $table = 'products';

    public array $fillable = [
        'name', 'type', 'description', 'price'
    ];

    public static function getFood() {
        $product = new Products();
        $products = $product->where('type', 'food')->get();
        return $products;
    }

    public function getComboFoods() {

        $combo_food = (new ComboFood())->where('combo_id', $this->id)->get();
        $foods = [];
        foreach ($combo_food as $key => $value) {
            $foods[] = (new Products())->where('id', $value['food_id'])->get()[0];
        }
        return $foods;
    }
}