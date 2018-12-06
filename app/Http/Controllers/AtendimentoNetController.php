<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 13/11/18
 * Time: 11:07
 */

namespace App\Http\Controllers;


use App\AtendimentoNet;
use App\ServiceUsage;
use App\ServiceUser;
use Illuminate\Http\Request;

class AtendimentoNetController extends Controller
{
    public function consulta(Request $request)
    {
        $cep = $request->get('cep');
        $token = $request->post('token');
        $service = ServiceUser::getByToken($token);
        $response =['ok'=>false,'msg'=>'Token Inválido'];

        if (isset($service->token)){
            if ($service->token == $token && $service->status) {
                $atendimento = AtendimentoNet::temCobertura($cep);
                ServiceUsage::register($token);
                $response['ok'] = $atendimento;
                $response['msg'] = $response['ok'] ? "Tem cobertura" : "Sem Cobertura";
            }else{
                $response['msg'] = "Token desativado";
            }
        }

        return json_encode($response);
    }
}