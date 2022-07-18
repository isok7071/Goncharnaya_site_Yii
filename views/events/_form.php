<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */
$photo_style = ['Справа'=>'Справа', 'Слева'=>'Слева'];
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 50, 'style' => 'text-transform:uppercase']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 80]) ?>

    <?= $form->field($model, 'price_per_person')->textInput(['maxlength' => 10, 'type'=>'number','min'=>0]) ?>

    <?= $form->field($model, 'photo_style')->dropDownList($photo_style,['prompt'=>'Выберите значение']) ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
