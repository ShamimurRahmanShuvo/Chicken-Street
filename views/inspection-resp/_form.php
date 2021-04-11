<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InspectionResp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspection-resp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inspection_id')->textInput() ?>

    <?= $form->field($model, 'item_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
