<?php
namespace App\Helpers\WidgetHelper;

class WidgetHelper
{


    public static function createWidget($meteo, $model){

        $start = '<div><i class="'.$meteo->icon.'"></i>'
               . ''.$meteo->city.''
               . ''.$meteo->temp.'°';

        $content = self::_medium();
        $end = '</div>';


        switch ($model) {
            case '_small' :
                $content = self::_small();
                break;
            case '_medium' :
                $content = self::_medium();
                break;
            case '_large' :
                $content = self::_large();
                break;
            case '_vertical' :
                $content = self::_vertical();
                break;
            case '_horizontal' :
                $content = self::_horizontal();
                break;
        }

        return $start.$content.$end;
    }


    public static function getWidgets(){

    }

    private static function _small(){
        return '<div>Ceci est un widget _small</div>';
    }

    private static function _medium(){
        return '<div>Ceci est un widget _medium</div>';
    }

    private static function _large(){
        return '<div>Ceci est un widget _large</div>';
    }

    private static function _vertical(){
        return '<div>Ceci est un widget _vertical</div>';
    }

    private static function _horizontal(){
        return '<div>Ceci est un widget _horizontal</div>';
    }

}