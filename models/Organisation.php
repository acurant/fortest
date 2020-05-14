<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "organisation".
 *
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $user_id
 * @property string|null $name
 * @property int|null $inn
 * @property string|null $data
 */
class Organisation extends \yii\db\ActiveRecord
{
    
    public function beforeSave($insert)
    {
    if (!parent::beforeSave($insert)) {
        
        return false;
    }
    
        $this->user_id=Yii::$app->user->identity->id;
    
    return true;
    }

    public function behaviors()
{
    return [
        TimestampBehavior::className(),
    ];
}

    public static function tableName()
    {
        return 'organisation';
    }


    public function getUser() {

        return $this->hasOne(User::className(),['id'=>'user_id']);

    }




    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'inn'], 'integer'],
            [['user_id', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
            'name' => 'Name',
            'inn' => 'Inn',
            'data' => 'Data',
        ];
    }
}
