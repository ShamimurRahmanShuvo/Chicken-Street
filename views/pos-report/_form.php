<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PosReport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pos-report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'outlet_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <?= $form->field($model, 'item_price')->textInput() ?>

    <?= $form->field($model, 'last_night_stock')->textInput() ?>

    <?= $form->field($model, 'delivery')->textInput() ?>

    <?= $form->field($model, 'sale')->textInput() ?>

    <?= $form->field($model, 'waste')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
