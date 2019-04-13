<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public $timestamps = false;

    public static function createEvaluation($data)
    {
        return DB::table('evaluations')->insertGetId([
            'competente' => $data['competente'],
            'cumplia' => $data['cumplio'],
            'satisfecho' => $data['satisfecho'],
            'renuncia' => $data['renuncia'],
            'empresa' => $data['empresa'],
            'empleado_id' => $data['id'],
            'perido_laboro' => $data['perido_laboro'],
            'equipo' => $data['equipo'],
            'antidoping' => $data['antidoping']

        ]);
    }

    public static function updateEvaluation($data)
    {
        $updated = DB::table('evaluations')->where([
            ['evaluations.empresa', '=', $data['empresa']],
            ['evaluations.empleado_id', '=', $data['id']]
        ])->update([
            'competente' => $data['competente'],
            'cumplia' => $data['cumplio'],
            'satisfecho' => $data['satisfecho'],
            'renuncia' => $data['renuncia'],
            'perido_laboro' => $data['perido_laboro'],
            'equipo' => $data['equipo'],
            'antidoping' => $data['antidoping']
        ]);

        return $updated;
    }

    public static function getEvaluationByCompany($data)
    {
        $evaluation = DB::table('evaluations')->where([
            ['evaluations.empresa', '=', $data['empresa']],
            ['evaluations.empleado_id', '=', $data['id']]
        ])->first();
        return $evaluation;
    }

    public static function getExistsEvaluation($data)
    {
        $count = DB::table('evaluations')->where([
            ['evaluations.empresa', '=', $data['empresa']],
            ['evaluations.empleado_id', '=', $data['id']]
        ])->count();
        return $count;
    }


}
