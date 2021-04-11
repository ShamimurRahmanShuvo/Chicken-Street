<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Dropdown;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PosOrder;
use app\models\ChickenOutlet;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PosOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_date',
            'chicken_item_name',
            'price',
            'packet_open',
            'delivery',
            'sale',
            'last_night_stock',
            'opening_stock',
            'closing_stock',
            'waste',
            'opening_price',
            'closing_price',
            'waste_price',
            'delivery_price',
            'last_night_stock_price',
            'packet_open_price',
            'sale_price',
            
        ],
    ]); ?>

</div>
