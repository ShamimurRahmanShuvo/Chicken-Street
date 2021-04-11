<?php

namespace app\controllers;

use Yii;
use app\models\InspectionItem;
use app\models\ChickenOrder;
use app\models\OrderDetail;
use app\models\InspectionItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;

/**
 * InspectionItemController implements the CRUD actions for InspectionItem model.
 */
class InspectionItemController extends Controller
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
     * Lists all InspectionItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new InspectionItemSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$sql = 'SELECT *,sum(IF(od.item_code="FA01",od.quantity,0)) FA01,SUM(IF(od.item_code="FA02",od.quantity,0)) FA02,SUM(IF(od.item_code="FA03",od.quantity,0)) FA03,SUM(IF(od.item_code="FA04",od.quantity,0)) FA04,
sum(od.quantity) "Total Item" FROM `chicken_order` left join order_detail od on chicken_order.id=od.order_id WHERE chicken_order.status=0 group by chicken_order.outlet_id';
       
        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InspectionItem model.
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
     * Creates a new InspectionItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InspectionItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InspectionItem model.
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
     * Deletes an existing InspectionItem model.
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
     * Finds the InspectionItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InspectionItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InspectionItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
