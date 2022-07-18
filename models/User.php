<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property int $admin
 * @property string|null $authKey
 * @property string|null $accessToken
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['admin'], 'integer'],
            ['email','email'],
            [['email', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Пароль',
            'admin' => 'Администратор?',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /*  Identity Interface    */


    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     *
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
       throw new NotSupportedException('Method isn`t implemented');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return User|array|\yii\db\ActiveRecord|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['email'=>$username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * Set random string to authKey
     * @throws \yii\base\Exception
     */
    public function setAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString(200);
    }

    /**
     * Set random string to authKey
     * @throws \yii\base\Exception
     */
    public function setAccessToken()
    {
        $this->accessToken = Yii::$app->security->generateRandomString(200);
    }
    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Hashes password
     *
     * @param string $password password to hash
     * @throws \yii\base\Exception
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }



}
