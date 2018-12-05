<?php

namespace App\Http\Controllers;

use App\Evaluation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Resignation;
use App\Employee;
use App\Job;

class EvaluationController extends Controller
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
        return view('evaluation.index', [
            'employees' => Employee::getEmployees(),
            'jobs' => Job::getJobs(),
        ]);
    }

    public function create()
    {

        $data = [
            'id' => Input::get('empleado_id'),
            'empresa' => Input::get('empresa_evalua'),
            'competente' => Input::get('radios_competente'),
            'cumplio' => Input::get('radios_cumplia'),
            'satisfecho' => Input::get('radios_satisfecho'),
            'renuncia' => Input::get('resignation'),
        ];

        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'max' => 'El campo :attribute maximo :max caracteres.',
            'size' => 'El campo :attribute debe tener :size caracteres.',
            'integer' => 'El campo :attribute debe ser entero.',
        ];
        $validator = Validator::make($data,
            [
                'competente' => 'required|int',
                'cumplio' => 'required|int',
                'satisfecho' => 'required|int',
                'renuncia' => 'required|string',
            ],
            $messages
        );

        if ($validator->fails()) {
            return redirect('evaluate/id/' . $data['id'])
                ->withErrors($validator)
                ->withInput();
        }

        $evaluation = Evaluation::getExistsEvaluation($data);
        if ($evaluation)
        {
            Evaluation::updateEvaluation($data);
            return redirect('evaluate/id/' . $data['id'])->with('status', 'Evaluacion actualizada Exitosamente!');
        }
        else
        {
            Evaluation::createEvaluation($data);
            return redirect('evaluate/id/' . $data['id'])->with('status', 'Evaluacion Creado Exitosamente!');
        }
    }

    public function getEmployeeByIdEvaluate($id)
    {
        $evaluation_info = '';
        $employee_info = Employee::getEmployeeById($id);
        $data =[
            'id' => $employee_info->id,
            'empresa' => $employee_info->empresa
        ];

        $evaluation = Evaluation::getExistsEvaluation($data);
        if($evaluation)
        {
            $evaluation_info = Evaluation::getEvaluationByCompany($data);
        }
        return view('evaluation.index', [
            'employee' => $employee_info,
            'job' => Job::getJobById($employee_info->puesto),
            'resignations' => Resignation::getResignations(),
            'evaluation_info' => $evaluation_info,
            'date_evaluation' => date("Y-m-d H:i:s"),
        ]);
    }
}
