<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChickenReceiveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chicken Receives';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-receive-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Chicken Receive', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'outlet_id',
            'comments:ntext',
            'receive_date',
            'order_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
