<?php

use yii\helpers\Html;

use yii\Picqer\Barcode;

/* @var $this yii\web\View */
/* @var $model app\models\ChickenOrder */

$this->title = 'Update Chicken Order: ' . ' ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Chicken Orders', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>

<div class="chicken-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

		<?php
        	$generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
        	echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('1000-TOA-01', $generator::TYPE_CODE_39)) . '">';
			//echo '<img src="'.$generator->getBarcode('7-TO01', $generator::TYPE_CODE_128).'">';
        ?>
</div>
