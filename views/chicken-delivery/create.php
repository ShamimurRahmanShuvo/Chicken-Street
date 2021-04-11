<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChickenDelivery */

$this->title = 'Create Chicken Delivery';
$this->params['breadcrumbs'][] = ['label' => 'Chicken Deliveries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
