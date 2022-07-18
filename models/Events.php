<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price_per_person
 * @property string $photo_style Стиль фото на карточке - справа или слева
 * @property string $photo
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price_per_person', 'photo_style', 'photo'], 'required'],
            [['price_per_person'], 'number'],
            [['price_per_person'], 'string','max'=>'10'],
            ['photo', 'file','extensions'=>'png, jpg, bmp'],
            [['photo_style'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 80],
            [['photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Краткое описание',
            'price_per_person' => 'Начальная цена за 1 персону',
            'photo_style' => 'Расположение фото на карточке',
            'photo' => 'Фото',
        ];
    }
}
