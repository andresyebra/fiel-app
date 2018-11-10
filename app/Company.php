<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;

    public static function getComapanies()
    {
        return DB::table('companies')->get();
    }

    public static function getDataBycompany()
    {
        return DB::table('companies')->where('clave','=', Auth::user()->empresa)->first();
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

    public static function updateCompany($id, $data)
    {
        $updated = DB::table('companies')->where('id', $id)
            ->update([
                'clave' => $data['Empresa'],
                'descripcion' => $data['Descripcion'],
                'area' => $data['Area']
            ]);

        return $updated;
    }

}
