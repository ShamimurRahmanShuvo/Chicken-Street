<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChickenItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chicken Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chicken-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Chicken Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'item_name',
            'item_code',
            'description',
            'pack_image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
