<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InspectionItem */

$this->title = 'Create Inspection Item';
$this->params['breadcrumbs'][] = ['label' => 'Inspection Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspection-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
