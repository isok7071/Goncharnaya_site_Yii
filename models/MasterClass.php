<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_class".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float|null $children_price
 * @property float|null $adults_price
 * @property string $photo
 *
 * @property MasterClassIncludes[] $masterClassIncludes
 */
class MasterClass extends \yii\db\ActiveRecord
{
    public $include_text = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_class';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'photo','include_text'], 'required'],
            [['description'], 'string'],
            [['children_price', 'adults_price'], 'number'],
            [['children_price'], 'string','max'=>'10'],
            [['adults_price'], 'string','max'=>'10'],
            [['name', 'photo'], 'string', 'max' => 255],
            ['photo', 'file','extensions'=>'png, jpg, bmp'],
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
            'description' => 'Описание внизу карточки',
            'children_price' => 'Цена для детей',
            'adults_price' => 'Цена для взрослых',
            'photo' => 'Фотография на карточке',
            'include_text' => 'Что входит в мастер класс',
        ];
    }

    /**
     * Gets query for [[MasterClassIncludes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasterClassIncludes()
    {
        return $this->hasMany(MasterClassIncludes::className(), ['id_master_class' => 'id']);
    }


}
