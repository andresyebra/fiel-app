<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Antidoping extends Model
{
    public $timestamps = false;

    public static function getAntidopings()
    {
        return DB::table('antidopings')->get();
    }

    public static function getAntidpoingById($id)
    {
        $antidopings = DB::table('antidopings')->where('antidopings.id', '=', $id)->first();
        return $antidopings;
    }

}
