<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    public static function getEmployees()
    {
        return DB::table('employees')->where('empresa','=', Auth::user()->empresa)->get();
    }

    public static function createEmployee($data)
    {
        return DB::table('employees')->insertGetId([
            'clave' => $data['Empleado'],
            'nombre' => $data['Nombre'],
            'curp' => $data['Curp'],
            'imss' => $data['Imss'],
            'empresa' => Auth::user()->empresa,
            'area' => Auth::user()->area,
            'puesto' => $data['Puesto']
        ]);
    }

    public static function deleteEmployee($id)
    {
        $delete = DB::table('employees')->where('id', '=', $id['id'])->delete();
    }

    public static function updateEmployee($id, $data)
    {
        $updated = DB::table('employees')->where('id', $id)
            ->update([
                'clave' => $data['Empleado'],
                'nombre' => $data['Nombre'],
                'curp' => $data['Curp'],
                'imss' => $data['Imss'],
                'puesto' => $data['Puesto'],
            ]);

        return $updated;
    }

    public static function getEmployeeById($id)
    {
        $employee = DB::table('employees')->where('employees.id', '=', $id)->first();
        return $employee;
    }
}
