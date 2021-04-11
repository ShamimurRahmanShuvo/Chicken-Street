<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ChickenService */

$this->title = 'Create Chicken Service';
$this->params['breadcrumbs'][] = ['label' => 'Chicken Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
