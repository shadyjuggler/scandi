<?php

declare(strict_types=1);

namespace App\Models\Entities;

use App\Models\Model;

use App\Models\DB;

abstract class Category extends Model
{
    // Table
    protected static $table = "categories";

    // Columns
    protected static $id = "id";

    public static function getAll(): array
    {
        return DB::query(self::$table, "*", "", \PDO::FETCH_COLUMN)
            ->fetchAll();
    }

    public static function getById(string|int $id): string
    {
        $where = DB::where(self::$id, $id);

        return DB::query(self::$table, self::$id, $where, \PDO::FETCH_COLUMN)
            ->fetch();
    }
}
