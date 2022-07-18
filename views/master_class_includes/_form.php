<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterClassIncludes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-class-includes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_master_class')->textInput() ?>

    <?= $form->field($model, 'id_include')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'include_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
