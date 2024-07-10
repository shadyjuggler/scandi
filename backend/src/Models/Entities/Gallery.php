<?php

declare(strict_types=1);

namespace App\Models\Entities;

use App\Models\Model;

use App\Models\DB;

abstract class Gallery extends Model
{

    // Table
    protected static $table = "galleries";

    // Columns
    protected static $id = "id";
    protected static $productId = "product_id";
    protected static $imgUrl = "image_url";


    public static function getAll()
    {
        return DB::query(self::$table, "*")
            ->fetchAll();
    }

    public static function getById(string | int $id)
    {
        $where = DB::where(self::$id, $id);

        return DB::query(self::$table, "*", $where)
            ->fetch();
    }


    public static function getUrlsByProductId(string $productId)
    {
        $where = DB::where(self::$productId, $productId);

        return DB::query(self::$table, self::$imgUrl, $where, \PDO::FETCH_COLUMN)
            ->fetchAll();
    }

    public static function getOneUrlByProductId(string $productId) {
        $where = DB::where(self::$productId, $productId);

        return DB::query(self::$table, self::$imgUrl, $where, \PDO::FETCH_COLUMN)
            ->fetch();
    }
}
