<?php
namespace App\Helpers\WidgetHelper;

use App\Models\WidgetModel as WidgetModel;
use Collective\Html\FormFacade as Form;

class WidgetHelper
{

    /**
     * Création du template widget html
     * @param $meteo
     * @param $model
     * @return string
     */
    public static function createWidget($meteo, $widget){

        $lg=2;

        switch ($widget->type) {
            case '_brown' :
                $lg = 2;
                break;
            case '_green' :
                $lg = 4;
                break;
            case '_yellow' :
                $lg = 2;
                break;
            case '_red' :
                $lg =3;
                break;
            case '_blue' :
                $lg =2;
                break;
        }

        $start = '<div class="col-md-6 col-lg-'.$lg.' col-xlg-3">'
                . '<div class="card card-hover">'
                . '<div class="box '.$widget->type.' text-center">';

        $content = '<h1 class="font-light text-white"><i class="'.$meteo->icon.'"></i></h1>'
                . '<h6 class="text-white">'.$meteo->city.'</h6>'
                . '<span class="temp">'.$meteo->temp.' ° ~  '.$meteo->description.'</span>';

        $end = '</div><code>'.$widget->name.'</code></div></div>';

        return $start.$content.$end;
    }

    /**
     *
     */
    public static function createWidgetForm($widget){

        $id = '<div class="type '.$widget->type.'"></div>'.Form::hidden('id[]', $widget->id);

        $enableCheck = '<div class="form-group form-check">'
            .Form::checkbox('check', $widget->enable, $widget->enable,
                array('id' => 'type_'.$widget->id, 'class' => 'form-check-input'));

        $name = Form::label('type_'.$widget->id, $widget->name, array('class' => 'form-check-label')).'</div>';

        $enable = Form::hidden('enable[]', $widget->enable, array('id' => 'type_'.$widget->id.'_enable'));

        return $id.$enableCheck.$name.$enable;
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

}