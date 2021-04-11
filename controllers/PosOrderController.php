<?php

namespace app\controllers;

use Yii;
use app\models\PosOrder;
use app\models\PosOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\PosReport;
use yii\data\SqlDataProvider;

/**
 * PosOrderController implements the CRUD actions for PosOrder model.
 */
class PosOrderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PosOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PosOrderSearch();
        $searchModel->order_date = Yii::$app->request->get('odate');
        $dataProvider = $searchModel->posReport();

        if(Yii::$app->request->get('odate')){
            $dataProvider = $searchModel->posReport();

            return $this->render('posreport',[
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
    }

    public function actionReportSave()
    {
        $dataProvider = new SqlDataProvider([
            'sql' => 'select report.*,
                    report.delivery+report.last_night_stock opening_stock,
                    report.delivery+report.last_night_stock-report.packet_open closing_stock,
                    report.packet_open-report.sale waste
                    from
                    (select  o.*,IFNULL(pos_report.last_night_stock ,0) last_night_stock
                    from (select item.id,item.price,
                    poseOrder.order_date,
                    poseOrder.packet_open,
                    poseOrder.delivery,
                    poseOrder.sale,
                    poseOrder.outlet_id
                    from item 
                    left join
                    (SELECT item_id,order_date,
                    sum(if(type=0,quantity,0)) delivery,
                    sum(if(type=1,quantity,0)) packet_open,
                    sum(if(type=2,quantity,0)) sale,
                    outlet_id
                    FROM `pos_order`group by order_date,item_id)
                    poseOrder
                    on 
                    item.id = poseOrder.item_id) o
                    left join
                    pos_report on 
                    o.id= pos_report.item_id) report ',

        ]);
        $models = $dataProvider->getModels();
        //var_dump($models);
        //$req = PosReport::find()->all();
        $request = Yii::$app->request->post();
        if($request){
            for ($i=0; $i < count($models) ; $i++) { 
                $pos = PosReport::find()->where([
                        'item_id'=>$models[$i]['id'],
                        'date'=>$models[$i]['order_date']
                    ])->one();

                if ($pos) {
                    $pos->outlet_id       = $models[$i]['outlet_id'];
                    $pos->item_id         = $models[$i]['id'];
                    $pos->item_price      = $models[$i]['price'];
                    $pos->last_night_stock= $models[$i]['closing_stock'];
                    $pos->delivery        = $models[$i]['delivery'];
                    $pos->sale            = $models[$i]['sale'];
                    $pos->waste           = $models[$i]['waste'];
                    $pos->date            = $models[$i]['order_date'];
                    $pos->update();
                }
                else{
                    $model = new PosReport;

                    $model->outlet_id       = $models[$i]['outlet_id'];
                    $model->item_id         = $models[$i]['id'];
                    $model->item_price      = $models[$i]['price'];
                    $model->last_night_stock= $models[$i]['closing_stock'];
                    $model->delivery        = $models[$i]['delivery'];
                    $model->sale            = $models[$i]['sale'];
                    $model->waste           = $models[$i]['waste'];
                    $model->date            = $models[$i]['order_date'];
                    if(!$model->save())
                    {
                        print_r($model->getErrors());
                    }
                } 
            }
            return $this->redirect(['index']);
        }  
    }

    /**
     * Displays a single PosOrder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PosOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PosOrder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PosOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PosOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PosOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PosOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PosOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
