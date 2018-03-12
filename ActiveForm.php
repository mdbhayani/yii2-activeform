<?php
namespace mdbhayani\yii2\activeform;

use mdbhayani\yii2\activeform\assets\ActiveFormWidgetAsset;
use yii\widgets\ActiveForm as YiiActiveForm;

class ActiveForm extends YiiActiveForm
{
    public function init()
    {
        parent::init();
        
        ActiveFormWidgetAsset::register($this->getView());
        
        $this->fieldClass = "mdbhayani\yii2\activeform\ActiveField";
    }
}