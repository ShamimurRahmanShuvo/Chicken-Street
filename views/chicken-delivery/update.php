<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChickenDelivery */

$this->title = 'Update Chicken Delivery: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Chicken Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chicken-delivery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
