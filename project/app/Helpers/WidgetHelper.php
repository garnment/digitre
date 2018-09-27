<?php
namespace App\Helpers\WidgetHelper;

use App\Models\WidgetModel as WidgetModel;

class WidgetHelper
{

    /**
     * Création du template widget html
     * @param $meteo
     * @param $model
     * @return string
     */
    public static function createWidget($meteo, $model){

        $start = '<div class="icon-wrap"><i class="'.$meteo->icon.'"></i>'
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

    /**
     * @param bool $active
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getWidgets($active=false){
        $widgets = WidgetModel::query();
        if ($active === true) $widgets-> where('enable', 1);

        return $widgets->get();
    }

    /**
     * Modèle _small
     * @return string
     */
    private static function _small(){
        return '<div>Ceci est un widget _small</div>';
    }

    /**
     * Modèle _medium
     * @return string
     */
    private static function _medium(){
        return '<div>Ceci est un widget _medium</div>';
    }

    /**
     * Modèle _large
     * @return string
     */
    private static function _large(){
        return '<div>Ceci est un widget _large</div>';
    }

    /**
     * Modèle _vertical
     * @return string
     */
    private static function _vertical(){
        return '<div>Ceci est un widget _vertical</div>';
    }

    /**
     * Modèle _horizontal
     * @return string
     */
    private static function _horizontal(){
        return '<div>Ceci est un widget _horizontal</div>';
    }

}