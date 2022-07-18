<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Master_classSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мастер-классы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-class-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать мастер-класс', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <link rel="stylesheet" href="../../css/main_page.css">
    <?= ListView::widget([
            'options'=>['class'=>'row-master-class'],
        'itemOptions'=>['tag'=>'div','class'=>'item'],
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout'=>'{items}'

    ]) ?>


</div>
