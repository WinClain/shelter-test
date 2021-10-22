<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Animal;
use frontend\models\AnimalFilter;
use frontend\models\Cals;
use Yii;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $modelFilter = new AnimalFilter;

        $animals = Animal::find();
        if($modelFilter->load(Yii::$app->request->post()) && $modelFilter->select){
            $animals = $animals->where(['type' => $modelFilter->select,'status'=>Animal::STATUS_ACTIVE])->all();
            // echo '<pre>'; print_r($modelFilter); echo '</pre>';die;
        }else{
            $animals = $animals->where(['status'=>Animal::STATUS_ACTIVE])->all();
        }

        $types = Animal::getAnimalsList();
        return $this->render('index',compact('animals','types','modelFilter'));
    }

    public function actionShelterAnimal()
    {
        $animal = Animal::find()->where(['status'=>Animal::STATUS_ACTIVE])->one();
        $animal->status = Animal::STATUS_INACTIVE;
        $animal->save();
        Yii::$app->session->setFlash('success', 'Congratulations, you got '.$animal->name.', we hope you will love it, you can pick it up at any of our shelters.');
        return $this->redirect(Url::to('/'));
    }

    public function actionRegisterAnimal(){
        $model = new Animal();

        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect(Url::to('/'));
        }

        return $this->render('create',compact('model'));
    }

}
