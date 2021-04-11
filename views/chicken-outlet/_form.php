<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChickenOutlet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chicken-outlet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'outlet_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outlet_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outlet_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'outlet_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
