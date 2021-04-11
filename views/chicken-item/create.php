<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChickenItem */

$this->title = 'Create Chicken Item';
$this->params['breadcrumbs'][] = ['label' => 'Chicken Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
