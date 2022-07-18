<div class="master-class-item">
    <img src="../../uploads/<?= $model->photo ?>" alt="master-class-photo">
    <div class="wrapper">
        <h4 class="text-uppercase"><?= \yii\helpers\Html::encode($model->name) ?></h4>
        <ul>
            <?php
            foreach($model->getMasterClassIncludes()->all() as $item){
                echo '<li>
                    <p>' . \yii\helpers\Html::encode($item->include_description). '</p>
                 </li>';
            }
            ?>

        </ul>
        <p class="description"><?= \yii\helpers\Html::encode($model->description) ?></p>

    </div>
    <div class="wrapper-end">
        <p class="ms-price child-price"><span><?= \yii\helpers\Html::encode($model->children_price) ?></span> руб. для детей</p>
        <p class="pb-2 ms-price adult-price"><span><?= \yii\helpers\Html::encode($model->adults_price) ?></span> руб. для взрослых</p>
        <?= \yii\helpers\Html::a('Изменить', [\yii\helpers\Url::toRoute(['view', 'id' => $model->id])], ['class' => 'btn w-100 btn-primary']) ?>
    </div>
</div>