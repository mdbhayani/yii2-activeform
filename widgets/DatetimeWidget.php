<?php
namespace dpassionateprogrammer\yii2\activeform\widgets;

use dpassionateprogrammer\yii2\activeform\assets\DatetimeWidgetAsset;
use yii\base\Widget;
use yii\helpers\Json;

class DatetimeWidget extends Widget
{
    public $inputID;
    public $config;
    
    public function run()
    {
        $view = $this->getView();
        
        DatetimeWidgetAsset::register($view);
        
        $this->config = Json::encode($this->config);
        
        $view->registerJs("
            $(\"#{$this->inputID}\").daterangepicker({$this->config});
        ");
    }
}