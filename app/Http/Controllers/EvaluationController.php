<?php

namespace App\Http\Controllers;

use App\Evaluation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Resignation;
use App\Antidoping;
use App\Employee;
use App\Company;
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
        $this->middleware(['auth', 'verified']);
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
            'perido_laboro' => Input::get('perido_laboro'),
            'equipo' => Input::get('radios_equipo'),
            'antidoping' => Input::get('antidoping'),
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
                'equipo' => 'required|string',
                'antidoping' => 'required|string',
                'renuncia' => 'required|string',
                'perido_laboro' => 'required|string',
            ],
            $messages
        );

        if ($validator->fails()) {
            return redirect('evaluate/id/' . $data['id'])
                ->withErrors($validator)
                ->withInput();
        }

        $evaluation = Evaluation::getExistsEvaluation($data);
        if ($evaluation) {
            Evaluation::updateEvaluation($data);
            return redirect('evaluate/id/' . $data['id'])->with('status', 'Evaluacion actualizada Exitosamente!');
        } else {
            Evaluation::createEvaluation($data);
            return redirect('evaluate/id/' . $data['id'])->with('status', 'Evaluacion Creado Exitosamente!');
        }
    }

    public function getEmployeeByIdEvaluate($id)
    {
        $evaluation_info = '';
        $evaluations_info_externals = [];
        $employee_info = Employee::getEmployeeById($id);
        $data = [
            'id' => $employee_info->id,
            'empresa' => $employee_info->empresa
        ];

        $evaluation = Evaluation::getExistsEvaluation($data);
        if ($evaluation) {
            $evaluation_info = Evaluation::getEvaluationByCompany($data);
        }

        $evaluation_company = Employee::getEmployeeByCurp($employee_info->curp);
        if(count($evaluation_company) >= 1)
        {
            foreach ($evaluation_company as $key => $value)
            {
                $data_external_company = [
                    'id' => $value->id,
                    'empresa' => $value->empresa
                ];
                $evaluation_external = Evaluation::getExistsEvaluation($data_external_company);
                if ($evaluation_external) {
                    $evaluation_external_info = Evaluation::getEvaluationByCompany($data_external_company);
                    $name_company = Company::getDataCompanyById($evaluation_external_info->empresa);
                    $evaluation_external_info->nombre_empresa = $name_company->descripcion;
                    array_push($evaluations_info_externals, $evaluation_external_info);
                }
            }
        }


        return view('evaluation.index', [
            'employee' => $employee_info,
            'info_company' => Company::getDataCompanyById($employee_info->empresa),
            'job' => Job::getJobById($employee_info->puesto),
            'resignations' => Resignation::getResignations(),
            'evaluation_info' => $evaluation_info,
            'antidopings' => Antidoping::getAntidopings(),
            'date_evaluation' => date("Y-m-d H:i:s"),
            'evaluacion_externa' => $evaluations_info_externals
        ]);
    }
}
