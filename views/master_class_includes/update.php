<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterClassIncludes */

$this->title = 'Update Master Class Includes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Master Class Includes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-class-includes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
