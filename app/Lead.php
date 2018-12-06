<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 28/09/18
 * Time: 17:53
 */

namespace App;


use App\Src\File;
use App\Src\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'net_combo';
    protected $connection = 'mysql';
    protected $fillable = [
        'name'
        , 'email'
        , 'telefone'
        , 'ddd'
        , 'telefone_2'
        , 'ddd_2'
        , 'cep'
        , 'cpf'
        , 'address'
        , 'number'
        , 'complement'
        , 'city'
        , 'state'
        , 'cobertura'
    ];

    public static function send()
    {
         (new File())->sendLeads();
    }

    /**
     * @param $email
     * @return mixed
     */
    public static function isExpired(string $email, $daysOfExpire = 30)
    {
        $lead = self::query()->where('email','=',$email)->get()->last();
        $response = true;

        if(is_object($lead)){
            $lastDate=$lead->created_at;
            $current = new Carbon();
            $expire = $current->subDays($daysOfExpire);
            $response = $expire > $lastDate;
        }

        return $response;
    }

    /**
     * @param array $data
     * @return array
     */
    public function add($data):array
    {
        $response = [
            'ok' => false
            , 'step' => 0
            , 'msg' => AtendimentoNet::MSG_CEP_NOT_FOUND
            , 'text' => 'Verifique se seu CEP está correto e insira novamente'
        ];

        $response['address'] = Cep::getAddresByCep($data['cep']);

        if (!is_object($response['address']))
            return $response;

        $lead = new static();

        $lead->email = $data['email'];
        $lead->cep = $data['cep'];
        $lead->cobertura = AtendimentoNet::temCobertura($data['cep']);
        $lead->cpf = $data['cpf'];

        if ($lead->save()) {
            $response['id'] = $lead->getAttributeValue('id');
            $response['ok'] = $lead->cobertura;
            $response['step'] = $response['ok'] ? 1 : 0;
            $response['msg'] = $response['ok'] ? AtendimentoNet::MSG_COVERED : AtendimentoNet::MSG_UNCOVERED;
            $response['text'] = $response['ok'] ? '' : 'Fique atento, notificaremos se houver novidades.';
        };

        return $response;
    }

    public function complete($data)
    {
        $response = ['ok' => false, 'step' => 0, 'msg' => AtendimentoNet::MSG_FAILED];
        $id = $data['id'];

        $post = $this->normalize($data);

        $lead = Lead::query()->find($id);

        if ($lead->update($post)) {
            $response['step'] = 2;
            $response['ok'] = true;
            $response['id'] = $id;
            $response['msg'] = AtendimentoNet::MSG_SUCCESS;
            $response['text'] = 'Em breve um de nossos consultores entrará em contato. Caso preferir, entre em 
            contato conosco pelo 3004-9191.';
            //$response['conv'] = $this->setConversion($id);
        };

        return $response;
    }

    protected function normalize($data)
    {
        unset($data['step']);
        unset($data['id']);
        $response = $data;
        $telefone = Helper::separateDdd($data['telefone']);
        $telefone_2 = isset($data['telefone_2']) ? Helper::separateDdd($data['telefone_2']) : '';

        $response['ddd'] = $telefone['ddd'];
        $response['telefone'] = $telefone['number'];
        $response['ddd_2'] = $telefone_2['ddd'];
        $response['telefone_2'] = $telefone_2['number'];

        return $response;
    }

    public function populateNumber()
    {
        $leads = self::query()->where('number','=','')->where('cobertura','=',true)->get();
        foreach ($leads as $lead){
            self::query()->find($lead->id)->update(['number'=>(\Faker\Factory::create())->numberBetween(10,300)]);
        }
    }

    public function updateCpf()
    {
        $leads = self::query()->where('cpf','=',null)->get();


    }
}