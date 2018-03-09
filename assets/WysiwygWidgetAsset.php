<?php
namespace dpassionateprogrammer\yii2\activeform\assets;

use yii\web\AssetBundle;

class WysiwygWidgetAsset extends AssetBundle
{
    public $sourcePath = "@vendor/summernote/summernote/dist";
    
    public $css = [
        "summernote.css"
    ];

    public $js = [
        "summernote.min.js"
    ];
    
    public $depends = [
        "yii\web\YiiAsset",
        "yii\bootstrap\BootstrapPluginAsset"
    ];
}