<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Админпанель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <p class="text-center text-secondary"><?= Html::encode('Добро пожаловать '.Yii::$app->user->identity->email) ?></p>
    <div class="row justify-content-center ">
        <div class="col-4 flex-wrap m-2 d-flex flex-column justify-content-center  border rounded shadow-sm">
            <h2 id="counter" class="text-danger"><?= Html::encode(\app\models\FeedbackForm::find()->where(['is_solved'=>0])->count()) ?></h2>
            <p>Вопросов <span style="text-decoration: underline;"> в данный момент</span> ожидают обратной связи</p>
            <p class="mt-auto">
                <?= Html::a('Управление обратной связью', ['/feedback_form'], ['class' => 'btn btn-outline-primary']) ?>
            </p>
        </div>
        <div class="col-4 m-2 d-flex flex-column justify-content-center border rounded shadow-sm">
            <h2 class="text-primary"><?= Html::encode(\app\models\User::find()->count()) ?></h2>
            <p>Всего администраторов на сайте</p>
            <p class="mt-auto">
                <?= Html::a('Управление пользователями', ['/user'], ['class' => 'btn btn-outline-primary']) ?>
            </p>
        </div>
        <div class="col-4 m-2 d-flex flex-column justify-content-center  border rounded shadow-sm">
            <h2 class="text-primary"><?= Html::encode(\app\models\MasterClass::find()->count()) ?></h2>
            <p>Всего мастер классов на сайте</p>
            <p class="mt-auto">
                <?= Html::a('Управление мастер-классами', ['/master_class'], ['class' => 'btn btn-outline-primary']) ?>
            </p>
        </div>
        <div class="col-4 m-2 d-flex flex-column justify-content-center  border rounded shadow-sm">
            <h2 class="text-primary"><?= Html::encode(\app\models\Events::find()->count()) ?></h2>
            <p>Всего творческих мероприятий на сайте</p>
            <p class="mt-auto">
                <?= Html::a('Управление творческими мероприятиями', ['/events'], ['class' => 'btn btn-outline-primary']) ?>
            </p>
        </div>
    </div>

</div>
<script>
    function updateCounter() {
        $.ajax({
            dataType: 'text',
            url: '../admin/counter',
            type: 'POST',
            success: function (response) {
                $('#counter').html(response);
            }
        })
    }

    setInterval(updateCounter, 10000);

</script>