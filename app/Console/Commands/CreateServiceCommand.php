<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 13/11/18
 * Time: 12:46
 */

namespace App\Console\Commands;


use App\ServiceUser;
use Illuminate\Console\Command;

class CreateServiceCommand extends Command
{
    protected $signature ='service:create {id_user} {service_name}';
    protected $description ='Criação de token para serviço';

    public function handle()
    {
        return ServiceUser::create($this->argument('id_user'),$this->argument('service_name'));
    }
}