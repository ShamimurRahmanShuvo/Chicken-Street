<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InspectionItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Inspection Items';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspection-item-index">

    <h1><?php echo "Order Report"; ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="float: right;">
        <?= Html::a('Print Report', [''], ['class' => 'btn btn-success btn-print', 'onclick'=>'window.print()']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'outlet_id',
            'FA01',
            'FA02',
            'FA03',
            'FA04',
            'Total Item'
        ]
    ]); ?>
    <?php
        $tF10 = 0;
        $tF13 = 0;
        $tF12 = 0;
        $tF11 = 0;
        $ttitem = 0;
        foreach ($dataProvider->getModels() as  $model) {
            $tF10 += $model['FA01'];
            $tF11 += $model['FA02'];
            $tF12 += $model['FA03'];
            $tF13 += $model['FA04'];
            $ttitem += $model['Total Item'];
        }

    ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Total Items</th>   
                <th>FA01</th>
                <th>FA02</th>
                <th>FA03</th>
                <th>FA04</th>
                <th>Total Item</th>
             </tr>   
         </thead>   
        <tr>
            <td>Total</td>   
            <td><?=$tF10?></td>
            <td><?=$tF11?></td>
            <td><?=$tF12?></td>
            <td><?=$tF13?></td>
            <td><?=$ttitem?></td>
        </tr>
    </table>
</div>
