<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
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
        return view('job.index', [
            'jobs' => Job::getJobs()
        ]);
    }

    public function create()
    {
        $data = [
            'id' => Input::get('job_id'),
            'description' => Input::get('description_job'),
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
                    'description' => 'required|string|max:100',
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('job/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            if(!empty($data['id']))
            {
                Job::updateJob($data['id'], $data);
                return redirect('job/index')->with('status', 'Puesto Actualisado Exitosamente!');
            }
            else
            {
                Job::createJob($data);
                return redirect('job/index')->with('status', 'Puesto Creado Exitosamente!');
            }


        } elseif (Input::get('delete')) {

            $validator = Validator::make($data,
                [
                    'id' => 'required|integer',
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('job/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            Job::deleteJob($data);
            return redirect('job/index')->with('status', 'Puesto Eliminado Exitosamente!');
        }

        return view('job.index');
    }

    public function getJobsById($id)
    {
        $job_id = Job::getJobById($id);
        if($job_id == null)
        {
            return view('errors.404');
        }

        $response = [
            'status' => 'success',
            'id' => $id,
            'job_data' => $job_id
        ];
        return response()->json($response);
    }

}
