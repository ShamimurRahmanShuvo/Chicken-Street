<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChickenDeliverySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chicken Deliveries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-delivery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Chicken Delivery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'delivery_id',
            'packet_id',
            'outlet_id',
            'delivery_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
