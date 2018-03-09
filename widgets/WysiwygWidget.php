<?php
namespace dpassionateprogrammer\yii2\activeform\widgets;

use dpassionateprogrammer\yii2\activeform\assets\WysiwygWidgetAsset;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class WysiwygWidget extends Widget
{
    public $inputID;
    public $config;
    
    public function run()
    {
        $view = $this->getView();
        
        WysiwygWidgetAsset::register($view);
        
        $defaultConfig = [
            "toolbar" => [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["font", ["strikethrough", "superscript", "subscript"]],
                ["fontsize", ["fontsize", "fontname"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]],
                ["picture", ["picture", "link", "table", "hr"]],
                ["misc", ["codeview"]]
            ]
        ];
        
        $this->config = Json::encode(ArrayHelper::merge($defaultConfig, $this->config));
        
        $view->registerJs("
            $(\"#{$this->inputID}\").summernote({$this->config});
        ");
    }
}