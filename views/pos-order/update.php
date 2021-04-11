<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PosOrder */

$this->title = 'Update Pos Order: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pos Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pos-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
