<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 13/11/18
 * Time: 13:03
 */

namespace App\Console\Commands;

use App\ServiceUser;
use Illuminate\Console\Command;

class ServiceDisableCommand extends Command
{
    protected $signature = "service:disable {token}";
    protected $description ="Desabilita token de serviço";

    public function handle()
    {
        return ServiceUser::disable($this->argument('token'));
    }
}