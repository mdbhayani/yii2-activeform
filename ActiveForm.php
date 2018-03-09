<?php
namespace mdbhayani\yii2\activeform;

use yii\widgets\ActiveForm as YiiActiveForm;

class ActiveForm extends YiiActiveForm
{
    public function init()
    {
        parent::init();
        
        $this->fieldClass = "mdbhayani\yii2\activeform\ActiveField";
    }
}