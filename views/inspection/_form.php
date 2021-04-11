<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inspection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspection-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'outlet_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inspection_date')->textInput() ?>

    <?= $form->field($model, 'inspection_time')->textInput() ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
