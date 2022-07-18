<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback_form".
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string $question
 * @property string $created_at
 * @property int $is_solved
 */
class FeedbackForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone_number', 'question'], 'required'],
            [['created_at'], 'safe'],
            [['is_solved'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['phone_number'], 'string', 'max' => 20],
            [['question'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone_number' => 'Номер телефона',
            'question' => 'Тема вопроса',
            'created_at' => 'Created At',
            'is_solved' => 'Решён?',
        ];
    }
}
