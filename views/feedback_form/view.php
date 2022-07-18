<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FeedbackForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки на обратную связь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="feedback-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить заявку?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone_number',
            'question',
            'created_at',
            [
                'attribute'=>'is_solved',
                'value'=>function($model){
                    if ($model->is_solved=='0'){
                        return Html::encode('Нет');
                    }else{
                        return  Html::encode('Да');
                    }
                },

            ],
        ],
    ]) ?>

</div>
