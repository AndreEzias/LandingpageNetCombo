<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 17/10/18
 * Time: 16:52
 */

namespace App\Src;


class Helper
{
    /**
     * @param string $string
     * @return string
     */
    public static function withoutSpecialChar(string $string) : string
    {
        $chars =["/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"];
        $replace = explode(" ","a A e E i I o O u U n N");
        return preg_replace($chars,$replace,$string);
    }

    /**
     * @param string $phoneNumber
     * @return array
     */
    public static function separateDdd(string $phoneNumber) : array
    {
        $phoneNumber = preg_replace('/[\(,\),\-,\s]/i', '', $phoneNumber);
        $ddd = preg_replace('/\A.{2}?\K[\d]+/', '', $phoneNumber);
        $number = preg_replace('/^\d{2}/', '', $phoneNumber);
        return ['ddd' => $ddd, 'number' => $number];
    }
}