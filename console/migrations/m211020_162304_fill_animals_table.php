<?php

use yii\db\Migration;
use frontend\models\Animal;

/**
 * Class m211020_162304_fill_animals_table
 */
class m211020_162304_fill_animals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $dog = new Animal();
        $dog->name = 'Rex';
        $dog->type = Animal::TYPE_DOG;
        $dog->save();

        $cat = new Animal();
        $cat->name = 'Kitty';
        $cat->type = Animal::TYPE_CAT;
        $cat->save();

        $turtle = new Animal();
        $turtle->name = 'Grut';
        $turtle->type = Animal::TYPE_TURTLE;
        $turtle->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $animals = Animal::find()->all();
        foreach($animals as $animal){
            $animal->delete();
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211020_162304_fill_animals_table cannot be reverted.\n";

        return false;
    }
    */
}
