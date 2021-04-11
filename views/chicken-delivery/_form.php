<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChickenDelivery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chicken-delivery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'delivery_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'packet_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outlet_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
