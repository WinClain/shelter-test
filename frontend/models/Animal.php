<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Animal extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;

    const TYPE_DOG = 'Dog';
    const TYPE_CAT = 'Cat';
    const TYPE_TURTLE = 'Turtle';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%animal}}';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['created_at', 'default', 'value' => date('d.m.Y',strtotime('now'))],
            [['name','type'],'required'],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }

    public function getAnimalsList(){
        return [
            self::TYPE_DOG => 'Dog',
            self::TYPE_CAT => 'Cat',
            self::TYPE_TURTLE => 'Turtle',
        ];
    }
}
