<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\data\ActiveDataProvider;
use yii\bootstrap\Dropdown;
use yii\helpers\ArrayHelper;

use app\models\OrderDetail;
use app\models\OrderDetailSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FcCostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Barcode';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p style="float: left;">
        <?= Html::a('Print All Barcode', [''], ['class' => 'btn btn-success btn-print', 'onclick'=>'window.print()']) ?>
    </p>
    <br/>
    <br/>
    <br/>

    <?php
        $model = OrderDetail::find()->where(['isconsume'=>0])->all();

        foreach ($model as $order) {
            $barcode_id = $order->id.$order->order_id.$order->item_code.$order->quantity;
            $generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
            echo '<div class="col-md-4"><img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barcode_id, $generator::TYPE_CODE_39)) . '"><p>'.$barcode_id.'</p></div>';
            //echo '<p>'. $barcode_id .'</p>';
        }
    ?>

</div>
