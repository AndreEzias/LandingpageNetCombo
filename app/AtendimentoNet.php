<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 05/10/18
 * Time: 12:35
 */

namespace App;


use App\Src\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class AtendimentoNet extends Model
{
    public $fillable = [
        'cep',
        'fg_cabeado',
        'cd_grupo_atendimento_pf',
        'cd_grupo_atendimento_pme',
        'ibge',
        'cidade',
        'uf',
        'ddd',
        'classe_social'
    ];

    protected $connection = "mysql_cep";
    protected $table = "cep_net";

    const MSG_FAILED = 'Desculpe, houve uma falha no envio, tente mais tarde';
    const MSG_NOT_EXPIRED ='Seu contato já consta em nossa base';
    const MSG_CEP_NOT_FOUND ='Houve uma falha em sua consuta de CEP!';
    const MSG_SUCCESS = 'Contato enviado com sucesso';
    const MSG_UNCOVERED = 'Você ainda não possui cobertura';
    const MSG_COVERED ='Você possui cobertura prossiga';

    /**
     * @param string $cep
     * @return bool
     */
    public static function temCobertura($cep = '') : bool
    {
        return (new static())->cobertura($cep);
    }

    /**
     * @param $cep
     * @return bool
     */
    public function cobertura($cep): bool
    {
        $cep = str_replace_first("-", "", $cep);
        $cabeamento = $this::query()->where('cep', '=', $cep)->first(['fg_cabeado']);
        $cobertura = false;
        if (is_object($cabeamento)) {
            $cobertura = intval($cabeamento->fg_cabeado) === 1;
        }

        return $cobertura;
    }

    /**
     * @param string $cep
     * @return string
     */
    public static function getCityByCep($cep)
    {
        $cep = str_replace_first("-", "", $cep);
        $response = 'Cep não encontrado';

        $ceps = self::query()->where('cep', '=', $cep)->get()->first();

        if (isset($ceps->cidade))
            $response = $ceps->cidade;

        return $response;
    }


    /**
     * @param object $lead
     * @return string
     */
    public static function getEps($lead) : string
    {
        $response = 'Error';
        if(!is_object($lead))
            return $response;

        $cep = str_replace_first("-", "", $lead->cep);
        $city = ucwords(strtolower(self::getCityByCep($cep)));
        if (!is_null(Config::get('eps.cidade.' . $city))) {
            $eps = Config::get('eps.cidade.' . $city);
            $response = strtoupper($eps);
        } else {
            $eps = Config::get('eps.ddd.' . $lead->ddd);
            $response = is_null($eps) ? '':$eps;
        }

        return $response;
    }

    /**
     * @param string $cep
     * @return string
     */
    public static function getCodigoNetByCep($cep) : string
    {
        $line = self::query()->where('cep', '=', $cep)->get()->first();
        if (is_object($line))
            return $line->ibge;
    }

    /**
     * @param string $city
     * @return string
     */
    public static function getCodigoNetByCity(string $city) : string
    {
        $city = Helper::withoutSpecialChar($city);
        $city = strtoupper($city);
        $line = self::query()->where('cidade','=',$city)->get()->first();
        return isset($line->ibge)?$line->ibge:'null';
    }

    public static function upBase()
    {
        $file_name = 'BASE_CEP_NET.csv';

        $file = fopen(storage_path($file_name), 'r');

        while (($line = fgetcsv($file)) !== false) {
            foreach ($line as $value) {
                $cell = explode(';', $value);
                if ($cell[0] !== 'CEP') {
                    $atendimento = new static();
                    $atendimento->CEP = $cell[0];
                    $atendimento->FG_CABEADO = $cell[1];
                    $atendimento->CD_GRUPO_ATENDIMENTO_PF = $cell[2];
                    $atendimento->CD_GRUPO_ATENDIMENTO_PME = $cell[3];
                    $atendimento->IBGE = $cell[4];
                    $atendimento->CIDADE = $cell[5];
                    $atendimento->UF = $cell[6];
                    $atendimento->DDD = $cell[7];
                    $atendimento->CLASSE_SOCIAL = $cell[8];
                    echo ($atendimento->save()) ? 'CEP: ' . $cell[0] . ' Inserido' : 'CEP: ' . $cell[0] . ' Falhou';
                    echo "<br>";
                }

            }
        }

        fclose($file);
    }
}