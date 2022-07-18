<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Feedback_formSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки на обратную связь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-form-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{pager}{items}',
        'pager' => ['maxButtonCount' => '5',
            'lastPageLabel' => '>>',
            'firstPageLabel' => '<<',],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'phone_number',
            'question',

            [
                'attribute' => 'is_solved',
                'value' => function ($model) {
                    if ($model->is_solved == '0') {
                        return Html::encode('Нет');
                    } else {
                        return Html::encode('Да');
                    }
                },

            ],
            'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
