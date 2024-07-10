<?php

namespace App\Controller;

use GraphQL\GraphQL as GraphQLBase;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\Type\SchemaConfig;
use RuntimeException;
use Throwable;

use App\Types;

use App\Models\DB;

use App\AppContext;
use Exception;


class GraphQL {
    static public function handle() {

        $databaseConfig = require_once __DIR__ . "/../../config/database-cred.php";

        try {

            DB::init($databaseConfig);

            $schema = new Schema(
                (new SchemaConfig())
                ->setQuery(Types::query())
                ->setMutation(Types::mutation())
            );
        
            $rawInput = file_get_contents('php://input');
            if ($rawInput === false) {
                throw new RuntimeException('Failed to get php://input');
            }
        
            $input = json_decode($rawInput, true);
            $query = $input['query'];
            $variableValues = $input['variables'] ?? null;
        
            $context = new AppContext();
            $result = GraphQLBase::executeQuery($schema, $query, null, $context, $variableValues);
            $output = $result->toArray();
        } catch (Throwable $e) {
            $output = [
                'error' => [
                    'message' => $e->getMessage(),
                ],
            ];
        }

        header('Content-Type: application/json; charset=UTF-8');
        return json_encode($output);
    }
}