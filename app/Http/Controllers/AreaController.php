<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
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
        return view('area.index', [
            'areas' => Area::getAreas()
        ]);
    }

    public function create()
    {
        $data = [
            'id' => Input::get('area_id'),
            'Area' => Input::get('key_area'),
            'Descripcion' => Input::get('description_area'),
        ];
        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'max' => 'El campo :attribute maximo :max caracteres.',
            'integer' => 'El campo :attribute debe ser entero.',
        ];

        if (Input::get('insert')) {

            $validator = Validator::make($data,
                [
                    'Area' => 'required|string|max:20',
                    'Descripcion' => 'required|string|max:100'
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('area/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            Area::createArea($data);
            return redirect('area/index')->with('status', 'Area Creada Exitosamente!');

        } elseif (Input::get('delete')) {

            $validator = Validator::make($data,
                [
                    'id' => 'required|integer',
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('area/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            Area::deleteArea($data);
            return redirect('area/index')->with('status', 'Area Eliminada!');
        }

        return view('areas.index');
    }

}
