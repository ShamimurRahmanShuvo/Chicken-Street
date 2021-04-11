<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InspectionItem */

$this->title = 'Update Inspection Item: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inspection Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inspection-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
