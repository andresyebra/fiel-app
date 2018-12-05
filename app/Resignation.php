<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Resignation extends Model
{
    public $timestamps = false;

    public static function getResignations()
    {
        return DB::table('resignations')->get();
    }

    public static function getResignationById($id)
    {
        $resignations = DB::table('resignations')->where('resignations.id', '=', $id)->first();
        return $resignations;
    }

}
