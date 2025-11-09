<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MetaController extends Controller
{
    public function tables()
    {
        $tables = ['cities', 'coffee_shops', 'coffee_menus', 'menu_sweets'];
        $result = [];

        foreach ($tables as $table) {
            $rowCount = DB::table($table)->count();
            $lastUpdate = DB::table($table)->max('updated_at');
            
            $result[] = [
                'table' => $table,
                'rows' => $rowCount,
                'last_update_max' => $lastUpdate,
            ];
        }

        return response()->json($result);
    }

    public function schema($table)
    {
        $allowedTables = ['cities', 'coffee_shops', 'coffee_menus', 'menu_sweets'];
        
        if (!in_array($table, $allowedTables)) {
            return response()->json(['error' => 'Table not found'], 404);
        }

        $columns = DB::select("
            SELECT 
                column_name as name,
                data_type as type,
                is_nullable,
                column_default as default,
                column_key as key
            FROM information_schema.columns 
            WHERE table_name = ? AND table_schema = DATABASE()
            ORDER BY ordinal_position
        ", [$table]);

        $formattedColumns = array_map(function($col) {
            return [
                'name' => $col->name,
                'type' => $col->type,
                'nullable' => $col->is_nullable === 'YES',
                'default' => $col->default,
                'key' => $col->key,
            ];
        }, $columns);

        return response()->json(['columns' => $formattedColumns]);
    }
}