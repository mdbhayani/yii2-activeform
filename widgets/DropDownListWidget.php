<?php
namespace dpassionateprogrammer\yii2\activeform\widgets;

use dpassionateprogrammer\yii2\activeform\assets\DropDownListWidgetAsset;
use yii\base\Widget;
use yii\helpers\Json;

class DropDownListWidget extends Widget
{
    public $inputID;
    public $config;
    
    public function run()
    {
        $view = $this->getView();
        
        DropDownListWidgetAsset::register($view);
        
        $this->config = Json::encode($this->config);
        
        $view->registerJs("
            $(\"#{$this->inputID}\").select2({$this->config});
        ");
    }
}