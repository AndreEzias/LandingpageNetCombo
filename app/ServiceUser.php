<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 13/11/18
 * Time: 12:10
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceUser extends Model
{
    protected $fillable = [
        'user_id'
        , 'service_name'
        , 'token'
        , 'status'
        , 'token'
    ];
    protected $connection = 'mysql_cep';
    protected $table = 'service_user';

    public static function create($id_user, $service)
    {
        $token = Str::random(32);
        $model = new self();
        $response = "Falha";

        $model->fill([
            'user_id' => $id_user
            , 'token' => $token
            , 'status' => true
            , 'service_name' => $service
        ]);

        if ($model->save())
            $response = $token;

        echo json_encode($response) . "\n";
        return $response;
    }

    public static function disable($token)
    {
        $response = 'Token inválido';
        if (self::query()->where('token', '=', $token)->update(['status' => false]))
            $response = "Token $token Desabilidato";
        echo json_encode($response)."\n";
        return $response;
    }

    public static function enable($token)
    {
        $response = 'Token inválido';
        if (self::query()->where('token', '=', $token)->update(['status' => true]))
            $response = "Token $token Habilitado";
        echo json_encode($response)."\n";
        return $response;
    }

    public static function getByToken($token)
    {
        if (strlen($token) !== 32)
            return 'Token inválido';

        return self::query()->where('token', '=', $token)->get()->first();
    }
}