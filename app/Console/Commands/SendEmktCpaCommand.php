<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 22/10/18
 * Time: 12:56
 */

namespace App\Console\Commands;


use App\Src\EmktCpa;
use Illuminate\Console\Command;
use Exception;

class SendEmktCpaCommand extends Command
{
    protected $signature = "send:emkt_cpa";

    protected $description = "Send Emkt CPA for Leads";

    public function handle()
    {
        try{
            (new EmktCpa())->send();
        }catch (Exception $e){
            $this->error("Error");
        }
    }

}