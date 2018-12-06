<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 13/11/18
 * Time: 12:31
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class ServiceUsage extends Model
{
    protected $fillable = [
      'token_id'
    ];

    protected $connection = 'mysql_cep';
    protected $table='service_usage';

    public static function register($token)
    {
        $model = new self();
        $service = ServiceUser::getByToken($token);

        if(isset($service->token))
        $model->fill(['token_id'=>$service->id]);
        $model->save();
    }
}