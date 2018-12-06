<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04/10/18
 * Time: 17:05
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cep extends Model
{
    protected $table = "cep";
    protected $connection ='mysql_cep';

    public static function getAddresByCep($cep=''){
        return (new static)->getNewAddressByCep($cep);
    }

    public function getNewAddressByCep($cep='')
    {
        $cep = str_replace_first("-", "", $cep);
        $cep_exists = is_object($this::query()->where('cep', '=', $cep)->first());

        if ($cep_exists) {

            $address = DB::connection('mysql_cep')
                ->table('cep')
                ->select(DB::raw("CONCAT(cep.tipo_logradouro,' ',cep.nome) as address"), "cep.uf as state", "city.nome as city")
                ->join('cep_cidade as city', 'cep.id_cidade', 'city.id')
                ->where('cep.cep', '=', $cep)
                ->get();

            return $address[0];
        }
        return false;
    }
}