<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 12/11/18
 * Time: 10:50
 */

namespace App\Http\Controllers;

use App\Lead;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\AtendimentoNet;
use App\Cep;

class WebServiceController extends Controller
{
    public function index(Request $request)
    {
        $response = ['ok' => false, 'msg' => 'Falha no envio'];

        if (!$request->exists('number'))
            $request->offsetSet('number', (\Faker\Factory::create())->numberBetween(10, 1000));

        $validData = $this->validate($request, $this->validateOptions(), $this->validateMessages());

        if ($validData != $request->post()) {
            $response['msg'] = $validData;
            return json_encode($response);
        }

        $dataLead = $this->buildLeadData($validData);

        $lead = new Lead();
        $lead->fill($dataLead);

        if ($lead->save()) {
            $u1id = $request->get('u1id');
            $newLead = Lead::query()->where('email', '=', $request->post('email'))->get()->first();
            $idLead = isset($newLead->id) ? $newLead->id : '';
            if ($dataLead['cobertura']) {
                $conv = $this->setConversion($u1id, $idLead);

                $response['ok'] = isset($conv->id_hash) ? true : false;
                $response['msg'] = $response['ok'] ? $conv->id_hash : 'Falha na conversão';
            } else {
                $response['msg'] = 'Sem Cobertura';
            }
        }

        return json_encode($response);
    }

    protected function buildLeadData($post)
    {
        $hasService = AtendimentoNet::temCobertura($post['cep']);
        $dataLead = $post;

        $phone = $this->separateDdd($post['telefone']);
        $dataLead['telefone'] = $phone['number'];
        $dataLead['ddd'] = $phone['ddd'];

        $address = Cep::getAddresByCep($post['cep']);

        foreach ($address as $key => $value)
            $dataLead[$key] = $value;

        $dataLead['cobertura'] = $hasService;
        $dataLead['number'] = '';
        $dataLead['complement'] = '';

        return $dataLead;
    }

    protected function validateOptions()
    {
        return [
            'name' => 'required'
            , 'email' => 'required|email'
            , 'telefone' => 'required|celular_com_ddd'
            , 'cep' => 'required|formato_cep'
            , 'cpf' => 'required|formato_cpf'
            , 'number' => 'required'
        ];
    }

    protected function validateMessages()
    {
        return [
            'name.required' => 'Nome requerido'
            , 'email.required' => 'E-mail requerido'
            , 'email.email' => 'E-mail inválido'
            , 'telefone.required' => 'Telefone requerido'
            , 'cep.required' => 'Cep requerido'
        ];
    }

    protected function separateDdd($phoneNumber)
    {
        $phoneNumber = preg_replace('/[\(,\),\-,\s]/i', '', $phoneNumber);
        $ddd = preg_replace('/\A.{2}?\K[\d]+/', '', $phoneNumber);
        $number = preg_replace('/^\d{2}/', '', $phoneNumber);
        return ['ddd' => $ddd, 'number' => $number];
    }

    protected function setConversion($u1id, $idLead = '')
    {
        $client = new Client();
        $url = 'https://venddi.com.br/data/set-conversion-by-u1id';
        $token = '70fc2be5a7eef47b4bffe93a7a195f9c';

        $body = ['token' => $token, 'u1id' => $u1id, 'id_lead' => $idLead];

        $response = $client->post($url, ['form_params' => $body]);

        return json_decode($response->getBody()->getContents());
    }
}