<?php

declare(strict_types=1);

namespace App\Models\Entities;

use App\Models\Model;

use App\Models\DB;

abstract class Price extends Model
{

    // Table
    protected static $table = "prices";

    // Columns
    protected static $id = "id";
    protected static $productId = "product_id";
    protected static $amount = "amount";
    protected static $currencyLabel = "currency_label";
    protected static $currencySymbol = "currency_symbol";


    public static function getAll()
    {
        return DB::query(self::$table)
            ->fetchAll();
    }

    public static function getById(string | int $id)
    {
        $where = DB::where(self::$id, $id);

        return DB::query(self::$table, "*", $where)
            ->fetch();
    }


    public static function getByProductId(string $productId)
    {
        $where = DB::where(self::$productId, $productId);

        return DB::query(
            self::$table,
            [
                self::$amount,
                self::$currencyLabel => "label",
                self::$currencySymbol => "symbol"
            ],
            $where
        )
            ->fetch();
    }
}
