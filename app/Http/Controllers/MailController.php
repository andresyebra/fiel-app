<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail($data, $action)
    {
        $config = [
            'name' => $data['name'],
            'email' => $data['name']
        ];

        switch ($action) {
            case 'registration':
                $view = 'email.welcome';
                $config['subject'] = 'Bienvenido a RHBC';
                break;
            case 'reset':
                $view = 'email.reset';
                $config['subject'] = 'Cambio de password';
                break;
            default :
                break;
        }
        Mail::send($view, ['user' => $config], function ($message) use ($config) {
            $message->from('contact@rhbc.mx', 'Contacto RHBC');
            $message->to($config['email'], $config['name'])->subject($config['subject']);
        });

        return 'Email was sent';
    }
}


