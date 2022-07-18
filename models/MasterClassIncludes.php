<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_class_includes".
 *
 * @property int $id
 * @property int $id_master_class
 * @property string $id_include
 * @property string $include_description
 *
 * @property MasterClass $masterClass
 */
class MasterClassIncludes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_class_includes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_master_class', 'id_include', 'include_description'], 'required'],
            [['id_master_class'], 'integer'],
            [['id_include', 'include_description'], 'string', 'max' => 255],
            [['id_master_class'], 'exist', 'skipOnError' => true, 'targetClass' => MasterClass::className(), 'targetAttribute' => ['id_master_class' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_master_class' => 'Id Master Class',
            'id_include' => 'Id Include',
            'include_description' => 'Include Description',
        ];
    }

    /**
     * Gets query for [[MasterClass]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMasterClass()
    {
        return $this->hasOne(MasterClass::className(), ['id' => 'id_master_class']);
    }
}
