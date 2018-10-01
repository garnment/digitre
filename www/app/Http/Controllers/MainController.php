<?php

namespace App\Http\Controllers;

use App\Helpers\WidgetHelper;
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
        $meteo->country=$meteo->sys->country;

        $meteo->wind=round(($meteo->wind->speed)*3.6).' km/h'; // On convertit en km/h

        $meteo->humidity=$meteo->main->humidity;
        $meteo->pressure=$meteo->main->pressure;

        $meteo->temp=round($meteo->main->temp); // On arrondit

        $meteo->temp_min=round($meteo->main->temp_min); // On arrondit
        $meteo->temp_max=round($meteo->main->temp_max); // On arrondit

        $meteo->main=$meteo->weather[0]->main;
        $meteo->description=$meteo->weather[0]->description;
        $meteo->icon=$this->meteo->convertIcon($meteo);

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
            $w = WidgetHelper::createWidget($meteo, $widget);
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


       return redirect()->route('widgets')->with('update', 'Vos paramètres ont été mis à jour.');
    }

}