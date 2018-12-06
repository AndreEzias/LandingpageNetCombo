<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 06/11/18
 * Time: 19:52
 */

namespace App\Src;


use App\Lead;
use App\Mail\Cpa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmktCpa
{
    public function send()
    {
        $leads = Lead::query(['email,name,cep'])
            ->where('sent_to', '=', null)
            ->where('cobertura', '=', true)
            ->get(['email', 'name', 'cep']);
        $quamtity = 0;

        $response = 'Nada a enviar hoje';

        if ($leads->count() > 0)
            foreach ($leads as $lead) {
                $cpa = (new Cpa($lead->email, $lead->name, $lead->cep))->build();
                Mail::send($cpa);
                if(Lead::query()->where('email','=',$lead->email)->update(['sent_to'=>'EmktCpa']))
                    $quamtity++;
            }

        $response = $quamtity > 0 ? "$quamtity E-mails enviados em " . date('d/m/y H:i:') : $response;

        Log::info($response);
        echo $response."\n";
    }
}