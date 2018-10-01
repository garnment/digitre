<?php

use Illuminate\Database\Seeder;
use App\Models\WidgetModel as Widget;

class WidgetsTableSeeder extends Seeder
{

    protected $template;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('widgets')->delete();
        $jsonData = File::get("database/data/widgetsData.json");
        $data = json_decode($jsonData);

        $jsonTemplate = File::get("database/data/widgetsTemplates.json");
        $this->template = json_decode($jsonTemplate);

        foreach($data as $obj){
            Widget::create(array(
                'name' => $obj->name,
                'enable' => $obj->enable,
                'type' => $obj->type,
                'html' => $this->_getTemplate($obj->html)
            ));
        }

    }

    private function _getTemplate($template)
    {
        return $this->template->$template;
    }
}
