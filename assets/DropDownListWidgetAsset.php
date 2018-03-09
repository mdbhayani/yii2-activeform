<?php
namespace dpassionateprogrammer\yii2\activeform\assets;

use yii\web\AssetBundle;

class DropDownListWidgetAsset extends AssetBundle
{
    public $sourcePath = "@vendor/select2/select2/dist";
    
    public $css = [
        "css/select2.min.css"
    ];

    public $js = [
        "js/select2.min.js"
    ];
    
    public $depends = [
        "yii\web\YiiAsset",
        "yii\bootstrap\BootstrapPluginAsset"
    ];
}