<?php

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use frontend\models\Animal;
use yii\bootstrap4\Html;

$this->title = 'Animals';
?>
<div class="site-index mt-5">

    <div class="mt-5 jumbotron text-center">
        
        <div class="row">
            <a class="btn btn-primary mr-3" href="<?= Url::to(['/site/register-animal']) ?>" role="button">Register new pet</a>
            <a class="btn btn-success" href="<?= Url::to(['/site/shelter-animal']) ?>" role="button">Shelter pet</a>
        </div>
            <?php $form = ActiveForm::begin(['method'=>'post']); ?>
                <?= $form->field($modelFilter, 'select')->dropDownList((new Animal())->getAnimalsList(),
                    ['prompt' => 'Select Type']) ?>
                <?= Html::submitButton('Select', ['class' => 'btn bg-success btn-block']); ?>
            <?php ActiveForm::end(); ?>
        

        
        <?php if(Yii::$app->session->hasFlash('success')) :?>
            <div class="alert alert-success my-3"><?php echo Yii::$app->session->getFlash('success')?></div>
        <?php endif; ?>
        <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Registered</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($animals as $animal): ?>
                <tr>
                    <th scope="row"><?= $animal->id ?></th>
                    <td><?= $animal->name ?></td>
                    <td><?= $animal->type ?></td>
                    <td><?= $animal->created_at ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    </div>

</div>
