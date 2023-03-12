<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class DatabaseConnectionController
{
    public function index()
    {
        try {
            $dbname = DB::connection()->getDatabaseName();
            return "Connected database name is: {$dbname}";
        } catch(\Exception $e) {
            return "Error in connecting to the database";
        }
    }

}
