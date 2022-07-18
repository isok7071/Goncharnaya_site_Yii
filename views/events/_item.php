
<?php if($model->photo_style=='Слева'){ ?>

<div class="event-card">
    <img class="left-photo" src="../../uploads/<?= $model->photo ?>">
    <div class="wrapper-card">
        <h2 class="event-name text-uppercase"><?= \yii\helpers\Html::encode($model->name) ?></h2>
        <p class="event-price">От <?= \yii\helpers\Html::encode($model->price_per_person) ?> руб./чел.</p>
        <p class="event-description"><?= \yii\helpers\Html::encode($model->description) ?></p>
        <?= \yii\helpers\Html::a('Изменить', [\yii\helpers\Url::toRoute(['view', 'id' => $model->id])], ['class' => 'mt-auto mb-3 btn  w-100 btn-primary']) ?>
    </div>
</div>

<?php }else{ ?>

<div class="event-card">
    <div class="wrapper-card">
        <h2 class="event-name text-uppercase"><?= \yii\helpers\Html::encode($model->name) ?></h2>
        <p class="event-price">От <?= \yii\helpers\Html::encode($model->price_per_person) ?> руб./чел.</p>
        <p class="event-description"><?= \yii\helpers\Html::encode($model->description) ?></p>
        <?= \yii\helpers\Html::a('Изменить', [\yii\helpers\Url::toRoute(['view', 'id' => $model->id])], ['class' => 'mt-auto mb-3 btn  w-100 btn-primary']) ?>
    </div>
    <img class="right-photo" src="../../uploads/<?= $model->photo ?>">
</div>

<?php } ?>