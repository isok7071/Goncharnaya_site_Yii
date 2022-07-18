<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MasterClass */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Мастер классы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$model->getMasterClassIncludes()
?>
<div class="master-class-view">
    <link rel="stylesheet" href="../assets/507d14d1/css/bootstrap.css">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'children_price',
            'adults_price',
            [   'attribute'=>'Что входит',
              'value'=>function($model){
                $includes = [];
                 foreach($model->getMasterClassIncludes()->all() as $item){
                            $includes[] = $item->include_description;
                         }
                 return implode(', ',$includes);
                },
                'label'=>'Что входит:'
            ],
            'photo',
        ],
    ]) ?>

</div>
