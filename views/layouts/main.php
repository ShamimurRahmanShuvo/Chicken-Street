<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Chicken Street',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Item', 'url' => ['/chicken-item/index']],
            ['label' => 'POS-Item', 'url' => ['/item/index']],
            ['label' => 'Outlet', 'url' => ['/chicken-outlet/index']],
            /*['label' => 'Barcode',  
                'url' => ['#'],
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Packet Barcode', 'url' => ['/chicken-order/packet-barcode']],
                    ['label' => 'Item Barcode', 'url' => ['/order-detail/item-barcode']],
                ],
            ],*/
            ['label' => 'Order & Delivery',  
                'url' => ['#'],
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'New Order', 'url' => ['/chicken-order/index','ChickenOrderSearch[status]'=>0]],
                    ['label' => 'Order Ready', 'url' => ['/chicken-order/index','ChickenOrderSearch[status]'=>3]],
                    ['label' => 'Delivered Order', 'url' => ['/chicken-order/index','ChickenOrderSearch[status]'=>4]],
                ],
            ],
            ['label' => 'Report',  
                'url' => ['#'],
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Pos Report', 'url' => ['/pos-order']],
                    //['label' => 'Order Report', 'url' => ['/inspection-item/index']],
                ],
            ],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->user_name . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Nourish Poultry <?= date('Y') ?></p>

        <p class="pull-right">Design &amp; Developed by <a href="http://sgcsoft.net/">Software Global Consultancy</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
