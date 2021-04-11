<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChickenOrder */

$this->title = 'Create Chicken Order';
$this->params['breadcrumbs'][] = ['label' => 'Chicken Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= $this->render('_form', [
        'model' => $model,
        'orderD' =>$orderD,
    ]) ?>

</div>
