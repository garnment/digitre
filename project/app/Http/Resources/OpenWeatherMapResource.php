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
        $json = Laracurl::get($this->OWM_URL.'?id='.$this->OWM_ID_CITY.'&units=metric&APPID='.$this->OWM_API_KEY);
        return json_decode($json->body);
    }

    public function convertIcon($code){

        $prefix = 'wi wi-';
        $file = storage_path() . "/json/OpenWeatherMapIcons.json";
        $weatherIcons = json_decode(file_get_contents($file), true);
        $icon = $weatherIcons[$code]['icon'] ;

        // Si pas dans les plages mentionnées, on ajoute le préfixe day / night.
        if ( ! ($code >  699  && $code <  800 ) &&  ! ($code >  899  && $code <  1000 )) {
            $icon =  'day-'.$icon;
        }
        return $prefix.$icon;
    }

}