<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    public static function getEmployees()
    {
        return DB::table('employees')->get();
    }

    public static function createEmployee($data)
    {
        return DB::table('employees')->insertGetId([
            'clave' => $data['Empresa'],
            'nombre' => $data['Nombre'],
            'curp' => $data['Curp'],
            'imss' => $data['Imss'],
            'empresa' => $data['Empresa'],
            'area' => $data['Area']
        ]);
    }

    public static function deleteEmployee($id)
    {
        $delete = DB::table('employees')->where('id', '=', $id['id'])->delete();
    }
}
