<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 17/10/18
 * Time: 16:59
 */

namespace App\Src;


use App\AtendimentoNet;
use App\Lead;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class File
{
    /**
     *
     */
    public function sendLeads()
    {
        $callcenters = ['fga', 'atento', 'vector'];

        $leads = Lead::query()
            ->where('cobertura', '=', true)
            ->where('sent_to', '=', null)
            ->where('telefone', '!=', null)
            ->get();

        if (count($leads) != 0)
            foreach ($leads as $lead) {
                $lead->sent_to = AtendimentoNet::getEps($lead);
            }

        foreach ($callcenters as $callcenter) {
            $response = ['ok' => false, 'msg' => 'Nada a Enviar para ' . $callcenter];

            $leadsForSend = $leads->where('sent_to', '=', strtoupper($callcenter));
            $quantity = $leadsForSend->count();

            if ($quantity > 0) {
                $response['ok'] = $this->sendToEps($callcenter, $leadsForSend);
                $response['msg'] = $response['ok'] ? $quantity . ' Leads Enviados para ' : 'Falha no envio para ';
                $response['msg'] .= $callcenter;
                $this->updateToSent($leadsForSend, $callcenter, $response['ok']);
            }

            Log::info($response['msg']);
            echo json_encode($response) . '<br>' . "\n";
        }

    }

    protected function sendToEps(string $eps, $leads): bool
    {
        if (method_exists((new self()), 'send_to_' . $eps)) {
            return call_user_func([(new self), 'send_to_' . $eps], $leads);
        } else {
            $response = false;
            $leadsByCity = $leads->groupby('city');
            foreach ($leadsByCity as $city => $leadsCity) {
                $cod = AtendimentoNet::getCodigoNetByCity($city);
                if (!is_null($cod)) {
                    $fileName = $this->buildFileName($cod);
                    $response = $this->sendFileToFtp($eps, $fileName, $leadsCity);
                }
            }
            return $response;
        }
    }

    protected function sendFileToFtp(string $eps, string $fileName, $leads): bool
    {
        $title = ['CPF', 'Nome', 'DDD Fixo', 'Telefone Fixo', 'DDD Celular', 'Telefone Celular', 'Produto', 'CEP', 'UF', 'Cidade', 'Bairro', 'Logradouro', 'Numero'];
        $ftp = Storage::disk('ftp_' . $eps);
        $file = fopen($fileName, 'w+');
        fputcsv($file, $title, ';');
        foreach ($leads as $lead) {
            $line = [
                'cpf' => $this->handleCpf($lead->cpf)
                , 'nome' => $lead->name
                , 'ddd' => $lead->ddd
                , 'telefone' => $lead->telefone
                , 'ddd_2' => $lead->ddd_2
                , 'telefone_2' => $lead->telefone_2
                , 'produto' => 'Combo'
                , 'cep' => $lead->cep
                , 'uf' => $lead->state
                , 'cidade' => $lead->city
                , 'bairro' => $lead->complement
                , 'logradouro' => $lead->address
                , 'numero' => $lead->number
            ];

            fputcsv($file, $line, ';');

        }

        $response = $ftp->put($fileName, $file);

        fclose($file);
        Log::info("Arquivo $fileName enviado para $eps");
        return $response;
    }

    protected function updateToSent($leads, $callcenter = '', bool $status = false): bool
    {
        $response = false;

        $fields = $status ? ['sent_to' => $callcenter, 'status' => $status] : ['status' => $status];

        foreach ($leads as $lead)
            $response = Lead::query()->where('id', '=', $lead->id)->update($fields);

        return $response;
    }

    protected function buildFileName($cod) : string
    {
        return 'Venddi_10672695000101_' . $cod . '_' . date('Ymd') . '_' . date('Hi') . '.txt';
    }

    protected function handleCpf($cpf)
    {
        return preg_replace('/(\.|-)/','',$cpf);
    }
}