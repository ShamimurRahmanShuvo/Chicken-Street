<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChickenPacket */

$this->title = 'Create Chicken Packet';
$this->params['breadcrumbs'][] = ['label' => 'Chicken Packets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-packet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
