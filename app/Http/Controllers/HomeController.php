<?php

namespace App\Http\Controllers;


use App\AtendimentoNet;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Lead;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $data = [];
        $data['ip'] = $request->ip();
        $data['device'] = (new Agent())->isDesktop() ? 'Desktop' : 'Mobile';

        return view('index', ['data' => $data]);
    }

    public function consultaCep(Request $request)
    {
        $data = [];
        $data['ip'] = $request->ip();
        $data['device'] = (new Agent())->isDesktop() ? 'Desktop' : 'Mobile';

        return view('consulta-cep', ['data' => $data]);
    }

    public function verificarCobertura(Request $request)
    {
        $lead = new Lead();
        $data = ['email' => $request->post('Email'), 'cep' => $request->post('cep')];
        $response = $lead->add($data);
        $responseView = $response['ok'] ? 'tem-cobertura' : 'obrigado';
        return view($responseView)->with(['response' => $response]);
    }

    public function obrigado(Request $request)
    {
        $lead = new Lead();
        $response = $lead->complete($request->post());
        return view('obrigado')->with(['response' => $response]);
    }


    public function temCobertura(Request $request)
    {
        $data = ['email' => $request->post('Email'), 'cep' => $request->post('cep')];
        $response = $this->add($data);
        $responseView = $response['ok'] ? 'tem-cobertura' : 'obrigado';
        return view($responseView)->with(['response' => $response]);
    }

    /**
     * @param Request $data
     */
    public function data(Request $data)
    {

        $step = intval($data->get('step'));
        $response = ['ok' => false, 'step' => $step, 'msg' => AtendimentoNet::MSG_FAILED];
        $post = $data->all();
        $lead = new Lead();

        /*Primeiro Step, adiciona dados iniciais e consulta cabeamento*/
        if ($step === 0) {
            if (Lead::isExpired($post['email'])){
                $response = $lead->add($post);
            }else{
                $response['msg'] =AtendimentoNet::MSG_NOT_EXPIRED;
                $response['text'] = 'Ligue para 3004-9191 para mais informações';
            }
        }

        /*Segundo Step, Completa cadastro e leva à conversão*/
        if ($step === 1) {
            $response = $lead->complete($post);
            if ($response['ok'])
                $response['conv'] = $this->setConversion($response['id']);
        }

        echo json_encode($response);
    }

    protected function setConversion($idLead)
    {
        $pixel = '<img src="https://venddi.online/trackr/cpl/cmpgn/52/?params=' . $idLead . '" width="1" height="1" border="0">';
        return $pixel;
    }
}