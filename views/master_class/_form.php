<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/* @var $model app\models\MasterClass */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .glyphicon.glyphicon-plus::before{
        content: "+";
        font-size: 24px !important;
        font-weight: 800;
        background: #ffc300;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        font-family: "Roboto", sans-serif;
        width: 30px;
    }
    .glyphicon.glyphicon-remove::before{
        content: "-";
        font-size: 24px !important;
        font-family: "Roboto", sans-serif;
        font-weight: 800;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        width: 30px;
    }

</style>
<div class="master-class-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'style' => 'text-transform:uppercase']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 90]) ?>

    <?= $form->field($model, 'children_price')->textInput(['maxlength' => 10, 'type'=>'number','min'=>0]) ?>

    <?= $form->field($model, 'adults_price')->textInput(['maxlength' => 10, 'type'=>'number','min'=>0]) ?>
    <?php
    echo $form->field($model, 'include_text')->widget(MultipleInput::className(), [
        'max'               => 5,
        'min'               => 1, // should be at least 2 rows
        'allowEmptyList'    => false,
        'enableGuessTitle'  => true,
        'addButtonPosition' => MultipleInput::POS_HEADER,// show add button in the header
    ])
        ->label(false);
    ?>
    <?= $form->field($model, 'photo')->fileInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton( 'Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>