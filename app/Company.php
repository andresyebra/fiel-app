<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;

    public static function getComapanies()
    {
        return DB::table('companies')->get();
    }

    public static function createCompany($data)
    {
        return DB::table('companies')->insertGetId([
            'clave' => $data['Empresa'],
            'descripcion' => $data['Descripcion'],
            'area' => $data['Area']
        ]);
    }

    public static function deleteCompany($id)
    {
        $delete = DB::table('companies')->where('id', '=', $id['id'])->delete();
    }

}
