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

$this->title = 'Pos Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pos-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--p>
        <?= Html::a('Create Pos Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p-->

    <div class="row">
        
        <?php 
            echo Html::beginForm(['index'], 'get', [
                'class'=> 'form-inline col-md-8'
                ]);
        ?>

        <?= Html::dropDownList('odate', $searchModel->order_date, ArrayHelper::map(PosOrder::find()->all(), 'order_date','order_date'),[
            'class'=>'form-control'
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Show', ['class' => 'btn btn-primary']) ?>
        </div>
        
        <?php echo Html::endForm(); ?>
        
    </div>

    <!--?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'item_id',
            'quantity',
            'outlet_id',
            'order_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?-->

</div>
