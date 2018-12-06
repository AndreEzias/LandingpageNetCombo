<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 13/11/18
 * Time: 12:59
 */

namespace App\Console\Commands;


use App\ServiceUser;
use Illuminate\Console\Command;

class ServiceEnableCommand extends Command
{
    protected $signature ='service:enable {token}';
    protected $description ="Habilita token de serviço";

    public function handle()
    {
       return ServiceUser::enable($this->argument('token'));
    }
}