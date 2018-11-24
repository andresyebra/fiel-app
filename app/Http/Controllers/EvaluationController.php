<?php

namespace App\Http\Controllers;

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

    public function getEmployeeByIdEvaluate($id)
    {
        return view('evaluation.index', [
        'employee' => Employee::getEmployeeById($id),
        'date_evaluation' => date("Y-m-d H:i:s"),
    ]);
    }
}
