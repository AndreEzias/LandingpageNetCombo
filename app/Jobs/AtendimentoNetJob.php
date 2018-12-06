<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 08/10/18
 * Time: 11:33
 */

namespace App\Jobs;


class AtendimentoNetJob extends Job
{
    public function __construct()
    {
        //
    }

    public function handle()
    {
        $file_name = 'BASE_CEP_NET.csv';
        $file = fopen(storage_path($file_name),'r');

        while(($line = fgetcsv($file)) !== false)
        {
            foreach ($line as $value){
                $cell = explode(';',$value);
                if($cell[0] !== 'CEP'){
                    $atendimento= new \App\AtendimentoNet();
                    $atendimento->cep  = $cell[0];
                    $atendimento->fg_cabeado = $cell[1];
                    $atendimento->cd_grupo_atendimento_pf = $cell[2];
                    $atendimento->cd_grupo_atendimento_pme = $cell[3];
                    $atendimento->ibge = $cell[4];
                    $atendimento->cidade = $cell[5];
                    $atendimento->uf = $cell[6];
                    $atendimento->ddd = $cell[7];
                    $atendimento->classe_social = $cell[8];
                    $atendimento->save();
                }

            }
        }

        fclose($file);

        return json_encode($line_data);
    }
}