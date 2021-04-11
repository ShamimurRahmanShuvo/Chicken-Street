<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChickenPacketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chicken Packets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-packet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Chicken Packet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_id',
            'packet_id',
            'production_date',
            'expire_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
