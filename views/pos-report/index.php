<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PosReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pos Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-report-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pos Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'outlet_id',
            'item_id',
            'item_price',
            'last_night_stock',
            // 'delivery',
            // 'sale',
            // 'waste',
            // 'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
