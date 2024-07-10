<?php

declare(strict_types=1);

namespace App\Models\Entities;

use App\Models\Model;

use App\Models\DB;

class Order extends Model {

    // Table
    protected static $table = "orders";

    // Columns
    protected static $id = "id";
    protected static $price = "total_price";
    protected static $amount = "total_items";
    protected static $data = "items_data";


    public static function getAll () {}   

    public static function getById (string | int $id) {}
    
    public static function addOrder (array $data) {
        return DB::insert(self::$table, $data);
    }
}

