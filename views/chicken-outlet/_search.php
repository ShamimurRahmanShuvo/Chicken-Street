<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChickenOutletSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chicken-outlet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'outlet_id') ?>

    <?= $form->field($model, 'outlet_name') ?>

    <?= $form->field($model, 'outlet_address') ?>

    <?= $form->field($model, 'outlet_phone') ?>

    <?php // echo $form->field($model, 'tax_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
