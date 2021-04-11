<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChickenPacket */

$this->title = 'Update Chicken Packet: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Chicken Packets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chicken-packet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
