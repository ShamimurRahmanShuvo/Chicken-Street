<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChickenOutlet */

$this->title = 'Create Chicken Outlet';
$this->params['breadcrumbs'][] = ['label' => 'Chicken Outlets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-outlet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
