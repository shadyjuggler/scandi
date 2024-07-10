<?php

declare(strict_types=1);

namespace App\Models;

use \PDO;
use \PDOException;
use PDOStatement;

class DB
{
    private static PDO $pdo;

    public static function init($config)
    {
        try {
            self::$pdo = new PDO("mysql:host={$config['host']};dbname={$config['database']}", $config["username"], $config["password"]);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }

    public static function getPDO(): PDO
    {
        return self::$pdo;
    }

    public static function setFetchMode ($mode) {
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $mode);
    }

    public static function query(
        string $table,
        array | string $columns = "*",
        string $where = "",
        int $mode = PDO::FETCH_OBJ
    ): PDOStatement {
        if (is_array($columns)) {
            $columns = self::prepareColumns($columns);
        }

        self::setFetchMode($mode);

        return self::$pdo->query("SELECT $columns FROM $table $where");
    }


    public static function where(string $column, string | int $value) {
        return "WHERE " .  $column . " = " . "'$value'";
    }

    public static function insert(string $table, array $data): bool
    {
        $columns = array_keys($data);
        $placeholders = array_map(fn($col) => ":$col", $columns);
        $columnsString = implode(", ", $columns);
        $placeholdersString = implode(", ", $placeholders);


        $sql = "INSERT INTO $table ($columnsString) VALUES ($placeholdersString)";
        $stmt = self::$pdo->prepare($sql);

        try {
            return $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Insert error: " . $e->getMessage();
            return false;
        }
    }

    private static function prepareColumns (array $arr): string {

        $arr = array_map(function($value, $key) {
            if ($key) {
                return "$key AS $value";
            } else {
                return "$value";
            }
        }, $arr, array_keys($arr));

        return implode(", ", $arr);
    }
}
