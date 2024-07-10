<?php

declare(strict_types=1);

namespace App\Models\Entities;

use App\Models\Model;

use App\Models\DB;

abstract class Product extends Model {

    // Table
    protected static $table = "products";

    // Columns
    protected static $id = "id";
    protected static $name = "name";
    protected static $inStock = "in_stock";
    protected static $category = "category_id";
    protected static $description = "description";
    protected static $brand = "brand";


    public static function getAll () {
        return DB::query(self::$table, "*")->fetchAll();
    }   


    public static function getAllByCategory (string $category) {
        $where = DB::where(self::$category, $category);
        if ($category === "all") {
            $where = "";
        }

        return DB::query(self::$table, "*", $where)->fetchAll();
    }


    public static function getById (string | int $id) {
        $where = DB::where(self::$id, $id);

        return DB::query(self::$table, "*", $where)->fetch();
    }
    
}

