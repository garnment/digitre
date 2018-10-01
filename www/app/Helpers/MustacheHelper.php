<?php
namespace App\Helpers;


class MustacheHelper
{


    public static function getVariables($string){
        $pattern = '|{{(.+)}}|U';
        preg_match_all(
            $pattern,
            $string,
            $out
        );

         return $out[1];
    }




}