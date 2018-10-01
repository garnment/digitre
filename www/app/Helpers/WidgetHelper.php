<?php
namespace App\Helpers;

use App\Helpers\MustacheHelper;
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

        $getVariables = MustacheHelper::getVariables($widget->html);
        $variables = [];

        foreach($getVariables as $variable){
            $variables['{{'.$variable.'}}']=eval("return $variable;");
        }
        $w = strtr($widget->html, $variables);
        return $w;
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
        $widgets->orderBy('order','ASC');

        return $widgets->get();
    }

}