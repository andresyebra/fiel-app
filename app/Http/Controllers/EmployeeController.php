<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Company;
use App\Employee;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::getEmployees(),
            'companies' => Company::getComapanies(),
            'areas' => Area::getAreas(),
        ]);
    }

    public function create()
    {
        $data = [
            'id' => Input::get('id_empleado'),
            'Empleado' => Input::get('clave_empleado'),
            'Nombre' => Input::get('nombre_empleado'),
            'Curp' => Input::get('curp_empleado'),
            'Imss' => Input::get('imss_empleado'),
            'Empresa' => Input::get('empresa_empleado'),
            'Area' => Input::get('area_empleado'),
        ];
        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'max' => 'El campo :attribute maximo :max caracteres.',
            'size' => 'El campo :attribute debe tener :size caracteres.',
            'integer' => 'El campo :attribute debe ser entero.',
        ];

        if (Input::get('insert')) {
            $validator = Validator::make($data,
                [
                    'Empleado' => 'required|string|max:20',
                    'Nombre' => 'required|string|max:100',
                    'Curp' => 'required|string|size:18',
                    'Imss' => 'required|string|size:11',
                    'Empresa' => 'required|string|max:20',
                    'Area' => 'required|string|max:20',
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('employees/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            Employee::createEmployee($data);
            return redirect('employees/index')->with('status', 'Empleado Creado Exitosamente!');

        } elseif (Input::get('delete')) {

            $validator = Validator::make($data,
                [
                    'id' => 'required|integer',
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('employees/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            Employee::deleteEmployee($data);
            return redirect('employees/index')->with('status', 'Empleado Eliminada!');
        }

        return view('employees.index');
    }

}
