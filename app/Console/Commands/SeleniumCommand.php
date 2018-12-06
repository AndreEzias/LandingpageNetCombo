<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 23/10/18
 * Time: 21:19
 */

namespace App\Console\Commands;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Console\Command;

class SeleniumCommand extends Command
{
    protected $signature = "run:selenium";

    public function handle()
    {
          $path = base_path().'/public';
          $host = 'http://localhost:4444';
          exec("php -S localhost:4444 -t ".$path);
// endereço do selenium server
        $host = 'http://localhost:4444/wd/hub';
        $webdriver = DesiredCapabilities::chrome();
        $driver = RemoteWebDriver::create($host, $webdriver);
        $driver->get('http://www.google.com.br');
        var_dump($driver->getTitle());
        $driver->close();

    }
}