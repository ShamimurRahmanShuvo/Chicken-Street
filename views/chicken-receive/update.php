<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChickenReceive */

$this->title = 'Update Chicken Receive: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Chicken Receives', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chicken-receive-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
