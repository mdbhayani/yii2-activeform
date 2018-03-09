<?php
namespace mdbhayani\yii2\activeform;

use mdbhayani\yii2\activeform\widgets\DatetimeWidget;
use mdbhayani\yii2\activeform\widgets\DropDownListWidget;
use mdbhayani\yii2\activeform\widgets\WysiwygWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveField as YiiActiveField;

class ActiveField extends YiiActiveField
{
    /**
     * @param array $options input options
     * @return string
     */
    public function singleDateInput($options = [])
    {
        $options = ArrayHelper::merge($this->inputOptions, $options);
        $config = [];
        
        if (!empty($options["config"])) {
            $config = $options["config"];
            unset($options["config"]);
        }
        
        $config = ArrayHelper::merge($config, ["singleDatePicker" => true]);
        
        parent::textInput($options);
        
        $this->parts["{input}"] = "
            <div class=\"input-group\">
                " . Html::activeTextInput($this->model, $this->attribute, $options) . "
                <span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-calendar\"></span></span>
            </div>
        ";
        
        echo DatetimeWidget::widget([
            "inputID" => $this->getInputId(),
            "config" => $config
        ]);
        
        return $this;
    }
    
    /**
     * @param array $options input options
     * @return string
     */
    public function dateRangeInput($options = [])
    {
        $options = ArrayHelper::merge($this->inputOptions, $options);
        $config = [];
        
        if (!empty($options["config"])) {
            $config = $options["config"];
            unset($options["config"]);
        }
        
        parent::textInput($options);
        
        $this->parts["{input}"] = "
            <div class=\"input-group\">
                " . Html::activeTextInput($this->model, $this->attribute, $options) . "
                <span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-calendar\"></span></span>
            </div>
        ";
        
        echo DatetimeWidget::widget([
            "inputID" => $this->getInputId(),
            "config" => $config
        ]);
        
        return $this;
    }
    
    public function dropDownList($items, $options = [])
    {
        $options = array_merge($this->inputOptions, $options);
        $options["class"] = !empty($options["class"]) ? $options["class"] . " select2" : "select2";
        $config = [];
        
        if (!empty($options["config"])) {
            $config = $options["config"];
            unset($options["config"]);
        }
        
        parent::dropDownList($items, $options);
        
        echo DropDownListWidget::widget([
            "inputID" => $this->getInputId(),
            "config" => $config
        ]);

        return $this;
    }
    
    public function wysiwyg($options = [])
    {
        $options = array_merge($this->inputOptions, $options);
        $config = [];
        
        if (!empty($options["config"])) {
            $config = $options["config"];
            unset($options["config"]);
        }
        
        parent::textarea($options);
        
        echo WysiwygWidget::widget([
            "inputID" => $this->getInputId(),
            "config" => $config
        ]);
        
        return $this;
    }
}