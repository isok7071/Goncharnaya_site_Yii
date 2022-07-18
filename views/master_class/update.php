<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterClass */

$this->title = 'Обновить мастер класс: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мастер классы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="master-class-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3 class="text-warning">Внимание! При обновлении мастер-класса, необходимо заново указать что в него входит!</h3>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
