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
    /*
     * @var array the input group for form controls
     * 
     * To add group addon before the input element:
     * inputGroup => ["before" => ""]
     * 
     * To add group addon after the input element:
     * inputGroup => ["after" => ""] 
     */
    public $inputGroup;
    
    /*
     * @var array feedBack config for bootstrap form-control
     * feedback can be a bootstrap glyphicon or fontawesome
     */
    private $feedBack;
    
    /*
     * @var array config for setting widget config property
     */
    private $config = [];
    
    /*
     * @var string regex allowed characters for Javascript events
     */
    private $allowedCharacters;
    
    /*
     * Sets the private $feedback property
     * Can be used for glyphicons or fontawesome
     * 
     * Examples:
     * 
     * $form->field($model, "fieldName")->setFeedBack(["glyphicon" => "lock"])
     * $form->field($model, "fieldName")->setFeedBack(["fontawesome" => "user"])
     */
    public function setFeedBack($feedback)
    {
        $this->feedBack = $feedback;
        
        return $this;
    }
    
    /*
     * Sets the private $config property to be further used in widgets
     * 
     * @param array set the private config property
     */
    public function setConfig($config)
    {
        $this->config = $config;
        
        return $this;
    }
    
    /*
     * Sets the alpha regex for textInput() method.
     * Allowed characters: A-Za-z and spaces
     */
    public function allowAlphaCharactersOnly()
    {
        $this->setAllowedCharacters("A-za-z ");
        
        return $this;
    }
    
    /*
     * Sets the numeric regex for textInput() method.
     * Allowed characters: 0-9
     */
    public function allowNumericCharactersOnly()
    {
        $this->setAllowedCharacters("0-9");
        
        return $this;
    }
    
    /*
     * Sets the alpha numeric regex for textInput() method.
     * Allowed characters: A-Za-z0-9
     */
    public function allowAlphaNumericCharactersOnly()
    {
        $this->setAllowedCharacters("A-Za-z0-9");
        
        return $this;
    }
    
    /*
     * Sets the regex for textInput() method.
     * Please note not to begin or end the regex with "[" OR "]" as this is already done in the javascript
     * @param string regex to perform events
     */
    public function setAllowedCharacters($regex)
    {
        $this->allowedCharacters = $regex;
        
        return $this;
    }
    
    public function textInput($options = array())
    {
        if (!empty($this->feedBack)) {
            $this->options["class"] .= " has-feedback";
        }
        
        parent::textInput($options);
        
        if (!empty($this->feedBack)) {
            if (!empty($this->feedBack["glyphicon"])) {
                $this->parts["{input}"] .= "<span class=\"glyphicon glyphicon-{$this->feedBack["glyphicon"]} form-control-feedback\"></span>";
            } else if (!empty($this->feedBack["fontawesome"])) {
                $this->parts["{input}"] .= "<span class=\"fa fa-{$this->feedBack["fontawesome"]} form-control-feedback\"></span>";
            }
        }
        
        if (!empty($this->inputGroup)) {
            $inputGroupBefore = $inputGroupAfter = "";
            
            if (!empty($this->inputGroup["before"])) {
                $inputGroupBefore = "<span class=\"input-group-addon\">{$this->inputGroup["before"]}</span>";
            }
            if (!empty($this->inputGroup["after"])) {
                $inputGroupAfter = "<span class=\"input-group-addon\">{$this->inputGroup["after"]}</span>";
            }
            
            if ($inputGroupBefore !== "" OR $inputGroupAfter !== "") {
                $this->parts["{input}"] = "
                    <div class=\"input-group\">
                        {$inputGroupBefore}
                        {$this->parts["{input}"]}
                        {$inputGroupAfter}
                    </div>
                ";
            }
        }
        
        if (!empty($this->allowedCharacters)) {
            $this->form->getView()->registerJs("
                $(\"#{$this->getInputId()}\").allowedCharacters(\"$this->allowedCharacters\");
            ");
        }
        
        return $this;
    }
    
    public function passwordInput($options = array())
    {
        if (!empty($this->feedBack)) {
            $this->options["class"] .= " has-feedback";
        }
        
        parent::passwordInput($options);
        
        if (!empty($this->feedBack)) {
            if (!empty($this->feedBack["glyphicon"])) {
                $this->parts["{input}"] .= "<span class=\"glyphicon glyphicon-{$this->feedBack["glyphicon"]} form-control-feedback\"></span>";
            } else if (!empty($this->feedBack["fontawesome"])) {
                $this->parts["{input}"] .= "<span class=\"fa fa-{$this->feedBack["fontawesome"]} form-control-feedback\"></span>";
            }
        }
        
        if (!empty($this->inputGroup)) {
            $inputGroupBefore = $inputGroupAfter = "";
            
            if (!empty($this->inputGroup["before"])) {
                $inputGroupBefore = "<span class=\"input-group-addon\">{$this->inputGroup["before"]}</span>";
            }
            if (!empty($this->inputGroup["after"])) {
                $inputGroupAfter = "<span class=\"input-group-addon\">{$this->inputGroup["after"]}</span>";
            }
            
            if ($inputGroupBefore !== "" OR $inputGroupAfter !== "") {
                $this->parts["{input}"] = "
                    <div class=\"input-group\">
                        {$inputGroupBefore}
                        {$this->parts["{input}"]}
                        {$inputGroupAfter}
                    </div>
                ";
            }
        }
        
        return $this;
    }
    
    public function dropDownList($items, $options = [])
    {
        parent::dropDownList($items, $options);
        
        if (!empty($this->inputGroup)) {
            $inputGroupBefore = $inputGroupAfter = "";
            
            if (!empty($this->inputGroup["before"])) {
                $inputGroupBefore = "<span class=\"input-group-addon\">{$this->inputGroup["before"]}</span>";
            }
            if (!empty($this->inputGroup["after"])) {
                $inputGroupAfter = "<span class=\"input-group-addon\">{$this->inputGroup["after"]}</span>";
            }
            
            if ($inputGroupBefore !== "" OR $inputGroupAfter !== "") {
                $this->parts["{input}"] = "
                    <div class=\"input-group\">
                        {$inputGroupBefore}
                        {$this->parts["{input}"]}
                        {$inputGroupAfter}
                    </div>
                ";
            }
        }
        
        echo DropDownListWidget::widget([
            "inputID" => $this->getInputId(),
            "config" => $this->config
        ]);

        return $this;
    }
    
    public function singleDateInput($options = [])
    {
        $options = array_merge($this->inputOptions, $options);
        
        parent::textInput($options);
        
        $this->parts["{input}"] = "
            <div class=\"input-group\">
                " . Html::activeTextInput($this->model, $this->attribute, $options) . "
                <span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-calendar\"></span></span>
            </div>
        ";
        
        $this->config = ArrayHelper::merge($this->config, ["singleDatePicker" => true]);
        
        echo DatetimeWidget::widget([
            "inputID" => $this->getInputId(),
            "config" => $this->config
        ]);
        
        return $this;
    }
    
    public function dateRangeInput($options = [])
    {
        $options = array_merge($this->inputOptions, $options);
        
        parent::textInput($options);
        
        $this->parts["{input}"] = "
            <div class=\"input-group\">
                " . Html::activeTextInput($this->model, $this->attribute, $options) . "
                <span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-calendar\"></span></span>
            </div>
        ";
        
        echo DatetimeWidget::widget([
            "inputID" => $this->getInputId(),
            "config" => $this->config
        ]);
        
        return $this;
    }
    
    public function wysiwyg($options = [])
    {
        parent::textarea($options);
        
        echo WysiwygWidget::widget([
            "inputID" => $this->getInputId(),
            "config" => $this->config
        ]);
        
        return $this;
    }
}
