<?php
namespace mdbhayani\yii2\activeform\assets;

use yii\web\AssetBundle;

class ActiveFormWidgetAsset extends AssetBundle
{
    public $sourcePath = "@vendor/mdbhayani/yii2-activeform/reserves";
    
    public $css = [];

    public $js = [
        "activeform.js"
    ];
    
    public $depends = [
        "yii\web\YiiAsset",
        "yii\bootstrap\BootstrapPluginAsset",
        "yii\widgets\ActiveFormAsset"
    ];
}