<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\DB;

abstract class Model {

    abstract static function getAll();
    abstract static function getById(string|int $id);
    
}