<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    public $timestamps = false;

    public static function getJobs()
    {
        return DB::table('jobs')->where('empresa', '=', Auth::user()->empresa)->get();
    }

    public static function createJob($data)
    {
        return DB::table('jobs')->insertGetId([
            'descripcion' => $data['description'],
            'empresa' => Auth::user()->empresa,
        ]);
    }

    public static function deleteJob($id)
    {
        $delete = DB::table('jobs')->where('id', '=', $id['id'])->delete();
    }

    public static function updateJob($id, $data)
    {
        $updated = DB::table('jobs')->where('id', $id)
            ->update([
                'descripcion' => $data['description'],
            ]);

        return $updated;
    }

    public static function getJobById($id)
    {
        $job = DB::table('jobs')->where('jobs.id', '=', $id)->first();
        return $job;
    }

}
