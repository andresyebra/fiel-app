<?php

namespace App\Http\Controllers;

use App\Area;
use App\Company;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
        return view('companies.index', [
            'companies' => Company::getDataBycompany(),
            'areas' => Area::getAreas(),
        ]);
    }

    public function create()
    {
        $id = Input::get('empresas_id');
        $data = [
            'Empresa' => Input::get('clave_empresa'),
            'Descripcion' => Input::get('descripcion_empresa'),
            'Area' => Input::get('area_empresa'),
        ];
        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'max' => 'El campo :attribute maximo :max caracteres.',
            'integer' => 'El campo :attribute debe ser entero.',
        ];

        if (Input::get('insert')) {

            $validator = Validator::make($data,
                [
                    'Empresa' => 'required|string|max:20',
                    'Descripcion' => 'required|string|max:100',
                    'Area' => 'required|string|max:20',
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('companies/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            if (!empty($id)) {
                Company::updateCompany($id, $data);
                return redirect('companies/index')->with('status', 'Empresa Actualisado Exitosamente!');
            } else {
                Company::createCompany($data);
                return redirect('companies/index')->with('status', 'Empresa Creada Exitosamente!');
            }

        } elseif (Input::get('delete')) {

            $validator = Validator::make($data,
                [
                    'id' => 'required|integer',
                ],
                $messages
            );

            if ($validator->fails()) {
                return redirect('companies/index')
                    ->withErrors($validator)
                    ->withInput();
            }

            Company::deleteCompany($data);
            return redirect('companies/index')->with('status', 'Empresa Eliminada!');
        }

        return view('companies.index');
    }

}