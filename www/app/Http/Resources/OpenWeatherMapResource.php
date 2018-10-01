<?php

namespace App\Http\Resources;
use Zjango\Laracurl\Facades\Laracurl;

class OpenWeatherMapResource
{

    private $OWM_ID_CITY;
    private $OWM_API_KEY;
    private $OWM_URL;

    public function __construct(){
        $this->OWM_ID_CITY = env('OWM_ID_CITY','');
        $this->OWM_API_KEY = env('OWM_API_KEY','');
        $this->OWM_URL = env('OWM_URL','');
    }
    
    public function getMeteo()
    {
        $json = Laracurl::get($this->OWM_URL.'?id='.$this->OWM_ID_CITY.'&units=metric&lang=fr&&appid='.$this->OWM_API_KEY);
        return json_decode($json->body);
    }

    public function convertIcon($meteo){


        $code = $meteo->weather[0]->id;

        $prefix = 'wi wi-'; // Prefixe css
        $file = storage_path() . "/app/public/OpenWeatherMap/iconsReferences.json";
        $weatherIcons = json_decode(file_get_contents($file), true);

        $date = new  \DateTime();
        $timestamp = $date->getTimestamp();

        /* Variables de test */
        //$timestamp = 1538286099; // jour
        //$timestamp = 1538286051; // nuit
        //$code = 962;
        /**/

        $day = $meteo->sys->sunrise;
        $night = $meteo->sys->sunset;

        // On détermine s'il fait jour ou nuit pour
        if ($timestamp >= $day && $timestamp <= $night){
            $j = 'day';
        } else {
            $j = 'night';
        }


        // Si clef day ou night absente, on utilise la clef neutral
        if ( array_key_exists($j, $weatherIcons[$code]['icon']) ) {
            $icon = '-'.$weatherIcons[$code]['icon'][$j];
        } else {
            $icon = $weatherIcons[$code]['icon']['neutral'];
            $j='';
        }


        return $prefix.$j.$icon;
    }

}