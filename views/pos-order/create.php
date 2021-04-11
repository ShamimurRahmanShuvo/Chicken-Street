<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PosOrder */

$this->title = 'Create Pos Order';
$this->params['breadcrumbs'][] = ['label' => 'Pos Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
