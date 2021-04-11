<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InspectionResp */

$this->title = 'Create Inspection Resp';
$this->params['breadcrumbs'][] = ['label' => 'Inspection Resps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspection-resp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
