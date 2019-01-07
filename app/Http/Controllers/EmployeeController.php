<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Job;
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
        $this->middleware(['auth', 'verified']);
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
            'jobs' => Job::getJobs(),
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
            'Puesto' => Input::get('job_empleado'),

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
                    'Puesto' => 'required|string',
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('employees/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            if (!empty($data['id'])) {
                Employee::updateEmployee($data['id'], $data);
                return redirect('employees/index')->with('status', 'Empleado Actualisado Exitosamente!');
            } else {
                Employee::createEmployee($data);
                return redirect('employees/index')->with('status', 'Empleado Creado Exitosamente!');
            }


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
            return redirect('employees/index')->with('status', 'Empleado Eliminado Exitosamente!');
        }

        return view('employees.index');
    }

    public function getEmployeeById($id)
    {
        $employee_id = Employee::getEmployeeById($id);
        if ($employee_id == null) {
            return view('errors.404');
        }

        $response = [
            'status' => 'success',
            'id' => $id,
            'employee_data' => $employee_id
        ];
        return response()->json($response);
    }

}
