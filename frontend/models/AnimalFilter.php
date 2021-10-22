<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Animal;

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
class AnimalFilter extends Model
{

    public $select = '';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['select', 'safe'],
        ];
    }

    public function getAnimalsList(){
        return [
            Animal::TYPE_DOG => 'Dog',
            Animal::TYPE_CAT => 'Cat',
            Animal::TYPE_TURTLE => 'Turtle',
        ];
    }
}
