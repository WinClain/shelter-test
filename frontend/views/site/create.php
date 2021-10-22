<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap4\Html;
use frontend\models\Animal;

$this->title = 'Animals';
?>
<div class="site-index">
    

    <div class="mt-5 jumbotron">
        <div class="row">
            <a class="btn btn-primary ml-3 mb-3" href="<?= Url::to(['/']) ?>" role="button">Back</a>
        </div>
        <?php $form = ActiveForm::begin(['method'=>'post']); ?>
            <?php echo $form->field($model, 'name')->textInput(['placeholder' => 'Name']); ?>
            <?php echo $form->field($model, 'type')->dropDownList((new Animal())->getAnimalsList(), ['prompt' => 'Select type']); ?>
            <?= Html::submitButton('Save', ['class' => 'btn bg-success btn-block']); ?>
        <?php ActiveForm::end(); ?>
    </div>

</div>

