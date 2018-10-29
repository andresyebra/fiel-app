<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $timestamps = false;

    public static function getAreas()
    {
        return DB::table('areas')->get();
    }

    public static function createArea($data)
    {
        return DB::table('areas')->insertGetId([
            'clave' => $data['Area'],
            'descripcion' => $data['Descripcion']
        ]);
    }

    public static function deleteArea($id)
    {
        $delete = DB::table('areas')->where('id', '=', $id['id'])->delete();
    }

}

