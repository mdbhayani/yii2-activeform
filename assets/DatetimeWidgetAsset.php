<?php
namespace mdbhayani\yii2\activeform\assets;

use yii\web\AssetBundle;

class DatetimeWidgetAsset extends AssetBundle
{
    public $sourcePath = "@vendor/mdbhayani/yii2-activeform/reserves";
    
    public $css = [
        "daterangepicker.css"
    ];

    public $js = [
        "moment.min.js",
        "daterangepicker.js"
    ];
    
    public $depends = [
        "yii\web\YiiAsset",
        "yii\bootstrap\BootstrapPluginAsset"
    ];
}