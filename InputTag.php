<?php

/**
 * Class InputTag
 * create a ui for input tag for get data as tag
 */
namespace aminkt\widgets\inputTag;

use yii\base\Widget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

class InputTag extends Widget
{

    // define id for use more than one IT(inputTag).
    public $id;
    // name of IT.
    public $name;
    // model of form.
    public $model;
    // name of attribute.
    public $attribute;
    /** @var  $form ActiveForm set form of text box */
    public $form;
    public $formLabel = true;
    // get settings of IT.
    public $settings;

    //Html options for files
    public $options = [];

    public function init()
    {
        parent::init();
        if (!$this->id)
            $this->id = "inputTag";
        if (!$this->name and !$this->model) {
            $this->model = null;
            $this->name = "inputTag";
        }
        if($this->attribute)
            $this->name = $this->attribute;
        if (!$this->form)
            $this->form = null;
        if (!$this->model)
            $this->model = null;

        if (!$this->settings)
            $this->settings = ['defaultText' => 'یک تگ اضافه کنید', 'removeWithBackspace' => 'true'];


        InputTagAsset::register($this->view);
    }

    public function generateJs(){
        $config =json_encode($this->settings);
        $id = $this->id;
        $js = <<<JS
    $('#$id').tagsInput($config);
JS;
        $this->getView()->registerJs($js);
    }

    public function generateInput(){
        if ($this->form){
            if(!$this->formLabel)
                echo $this->form->field($this->model, $this->attribute)->textInput($this->options)->label(false);
            else
                echo $this->form->field($this->model, $this->attribute)->textInput($this->options);
        } else if ($this->model) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->options);
        }
    }

    public function run()
    {
        $this->generateInput();
        $this->generateJs();
    }
}