<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 06/11/18
 * Time: 11:11
 */

namespace App\Mail;


use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class Cpa extends Mailable
{
    use Queueable, SerializesModels;

    /** @var string the address to send the email */
    protected $to_address;

    /** @var string name of user */
    protected $name;

    /** @var string zip code of user  */
    protected $cep;

    /**
     * Create a new message instance.
     *
     * @param string $to_address the address to send the email
     * @param float $winnings   the winnings they won
     *
     * @return void
     */

    public function __construct($to_address,$name, $cep)
    {
        $this->to_address = $to_address;
        $this->name = $name;
        $this->cep = $cep;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->to_address,$this->name)
            ->from('contato@mail.melhorbandalarga.com','NET COMBO')
            ->subject('Você possui cobertura!')
            ->markdown('template.cpa_recall')
            ->with(
                [
                    'name' => $this->name
                    ,'cep' => $this->cep
                ]
            );
    }
}