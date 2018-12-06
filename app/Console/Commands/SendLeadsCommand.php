<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 22/10/18
 * Time: 12:56
 */

namespace App\Console\Commands;


use App\Lead;
use Illuminate\Console\Command;
use Exception;

class SendLeadsCommand extends Command
{
    protected $signature = "send:leads";

    protected $description = "Send leads for Client";

    public function handle()
    {
        try{
            Lead::send();
        }catch (Exception $e){
            $this->error("Error");
        }
    }

}