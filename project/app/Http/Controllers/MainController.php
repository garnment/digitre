<?php

namespace App\Http\Controllers;

use App\Helpers\WidgetHelper\WidgetHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\OpenWeatherMapResource as OpenWeatherMapResource;
use App\Models\WidgetModel;
use Illuminate\Http\Request;

class MainController extends Controller
{

    protected $meteo;
    
    public function __construct(){
        $this->meteo =  new OpenWeatherMapResource();
    }

    /**
     * Affiche la liste des widgets du user
     */
    public function showWidgets()
    {
        // On récupère les infos météo de l'API OpenWeatherMap
        $meteo =$this->meteo->getMeteo();

        $meteo->city=$meteo->name;
        $meteo->temp=round($meteo->main->temp);
        $meteo->description=$meteo->weather[0]->description;
        $meteo->icon=$this->meteo->convertIcon($meteo->weather[0]->id);

        /**
         * On récupère tous les widgets actifs
         * et on applique un modèle parmi :
         * _small
         * _medium
         * _large
         * _horizontal
         * _vertical
         */
        $widgetsActifs = WidgetHelper::getWidgets(true);
        $widgets = [];

        foreach ($widgetsActifs as $widget) {
            $w = WidgetHelper::createWidget($meteo, $widget->type);
            $widgets[] = $w;
        }

        return view('widgets', [
            'title' => 'Widgets',
            'widgets' => $widgets
        ]);
    }

    /**
     * Affiche les actions possibles sur les widgets (add, delete)
     */
    public function showSettings()
    {
        /**
         * On récupère tous les widgets disponibles
         */
        $allWidgets = WidgetHelper::getWidgets();
        $widgets = [];

        foreach ($allWidgets as $widget) {
            $w = WidgetHelper::createWidgetForm($widget);
            $widgets[] = $w;
        }

        return view('settings', [
            'title' => 'Settings',
            'widgets' => $widgets
        ]);
    }


    public function updateSettings(Request $request){

        foreach ($request->input('id') as $key=>$id) {
            $widget = WidgetModel::find($id);
            $widget->enable = $request->input('enable')[$key];
            $widget->save();
       };

       return redirect('/');
    }

}