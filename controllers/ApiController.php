<?php

namespace app\controllers;

use Yii;
use app\models\ChickenDelivery;
use app\models\ChickenDeliverySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\auth\QueryParamAuth;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ChickenItem;
use yii\helpers\Url;
use app\models\ChickenOrder;
use app\models\ChickenOutlet;
use app\models\ChickenPacket;
use app\models\ChickenReceive;
use app\models\OrderDetail;
use app\models\ChickenService;
use app\models\Served;
use app\models\Item;
use app\models\PosOrder;
use app\models\InspectionItem;
use app\models\Inspection;
use app\models\InspectionResp;

class ApiController extends Controller
{
    public $enableCsrfValidation = false;

    /*public function init(){
        parent::init();
        Yii::$app->errorHandler->errorAction = 
    }*/

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
            'tokenParam' => 'token',
            'except'=> ['member-login',
                // 'create-order', 
                'get-item', 
                // 'member-signup',
                // 'make-delivery', 
                // 'get-delivery',
                // //'all-order',
                // 'pos-order',
                'chicken-item',
                // 'all-delivery',
                // 'packet-ready',
                // 'ready-packet',
                // 'received-packet',
                // 'product-use',
                // 'all-received',
                // 'service-request',
                // 'all-service',
                // 'served-service',
                // 'inspection-on',
                // 'inspection-response',
                // 'all-response'
            ]
        ];

        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'text/html' => \yii\web\Response::FORMAT_JSON,
                'application/json' => \yii\web\Response::FORMAT_JSON,
                'application/xml' => \yii\web\Response::FORMAT_XML,
            ],
        ];

        return $behaviors;
    }

    //Member Login

    public function actionMemberLogin(){
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            $user = $model->getUser();
            $model = ChickenOutlet::findOne(['outlet_id'=>$user->user_name]);

            return [
                'status' =>1,
                'message' => success,
                'user_name'=> $user->user_name,
                'outlet_name' => $model->outlet_name,
                'outlet_address' => $model->outlet_address,
                'outlet_phone' => $model->outlet_phone,
                'token' => $user->token
            ];
        } else {
            Yii::$app->response->statusCode = 400;
            return [
                'status'=> 0,
                'message'=>"Username & password mismatch",
                'success'=> "false",
                'message1'=> $model->getErrors()
                ];
        }
    }

    //Change Password

    public function actionChangePassword(){
        $request = Yii::$app->request;
        if(Yii::$app->user->identity->validatePassword($request->post('currentPassword'))){
            if($request->post('newPassword') === $request->post('r_newPassword')){
                Yii::$app->user->identity->setPassword($request->post('newPassword'));
                Yii::$app->user->identity->save();
                return [
                    'message'=> 'password changed successfully'
                ];
            }else{
                Yii::$app->response->statusCode = 400;
                return [
                    'message'=> 'Repeat password exactly'
                ];
            }
        }else{
            Yii::$app->response->statusCode = 400;
            return [
                'message'=> 'Password not match'
            ];
        }
    }

    //Member Logout

    public function actionLogout(){
        Yii::$app->user->logout();
        return [
            'message'=> 'logout successfully'
        ];
    }


    //Create Order by outlet

    public function actionCreateOrder(){

        $resp=['status'=>0,'message'=>'Data Not save'];
        $request=[];
        $request = Yii::$app->request->post();
        
        if ($request) {
            $model = new ChickenOrder();

            $model->outlet_id =  $request['outlet_id'];
            $model->order_date =  $request['order_date'];
            $model->status = 1; 
            if($model->save()){
                for($i=0;$i<count($request['item']);$i++){
                    $order = new OrderDetail();
                    $order->order_id=$model->id;
                    $order->item_code=$request['item'][$i]['item_code'];
                    $order->quantity=$request['item'][$i]['quantity'];
                    $order->save();
                }
                $resp=['status'=>1,'message'=>'Data Save'];
            }
	   }
            return  $resp;
    }

    //POS Order

    public function actionPosOrder(){
        $resp=['status'=>0,'message'=>'Data Not save'];
        $request=[];
        $request = Yii::$app->request->post();
        
        if ($request) {
            $model = new PosOrder();

            for($i=0;$i<count($request['item']);$i++){
                $model->item_id =  $request['item'][$i]['item_id'];
                $model->quantity =  $request['item'][$i]['quantity'];
                $model->outlet_id = $request['item'][$i]['outlet_id'];
                $model->order_date = $request['item'][$i]['order_date'];
                $model->type = '0';
                $model->save();
            }
            
            $resp=['status'=>1,'message'=>'Number of received product saved'];
       }
            return  $resp;
    }

    //Opened Packet

    public function actionPacketOpened(){
        $resp=['status'=>0,'message'=>'Data Not save'];
        $request=[];
        $request = Yii::$app->request->post();
        
        if ($request) {
            $model = new PosOrder();

            for($i=0;$i<count($request['item']);$i++){
                $model->item_id =  $request['item'][$i]['item_id'];
                $model->quantity =  $request['item'][$i]['quantity'];
                $model->outlet_id = $request['item'][$i]['outlet_id'];
                $model->order_date = $request['item'][$i]['order_date'];
                $model->type = '1';
                $model->save();
            }
            
            $resp=['status'=>1,'message'=>'Number of opened product saved'];
       }
            return  $resp;
    }

    // Used Product

    public function actionWasteOrder(){
        $resp=['status'=>0,'message'=>'Data Not save'];
        $request=[];
        $request = Yii::$app->request->post();
        
        if ($request) {
            $model = new PosOrder();

            for($i=0;$i<count($request['item']);$i++){
                $model->item_id =  $request['item'][$i]['item_id'];
                $model->quantity =  $request['item'][$i]['quantity'];
                $model->outlet_id = $request['item'][$i]['outlet_id'];
                $model->order_date = $request['item'][$i]['order_date'];
                $model->type = '2';
                $model->save();
            }
            
            $resp=['status'=>1,'message'=>'Number of used product saved'];
       }
            return  $resp;
    }


	//Get Pack Order Item 

	public function actionGetItem(){
		$item = ChickenItem::find()->all();
        return $item;
	}

    //Get Chicken Item for POS

    public function actionChickenItem(){
        $chicken = Item::find()->all();
        return $chicken;
    }

	//All Order(Pack)

	public function actionAllOrder($status=0){
		$orders = ChickenOrder:: find()->where(['status'=>$status])->all();
		return $orders;
	}

    //Ready Packet

    public function actionPacketReady(){
        $resp=['status'=>0,'message'=>'Data Not save'];
        
        $request = Yii::$app->request->post();       

        if ($request) {

            $model = new ChickenPacket();
            $model->order_id = $request['order_id'];
            $model->packet_id = $request['packet_id'];
            $model->production_date = $request['production_date'];
            $model->expire_date = $request['expire_date'];

            if($model->save()){
                $order = ChickenOrder::find()->where(['id'=> $request['order_id']])->one();
                $order->status = '3';
                $order->save();
                $resp =['status'=>1,'message'=>'Packet Ready for Delivery'];
                return  $resp;
            }else{
                return $model->getErrors();
            }
            
        } 
    }

    //All Ready Packet for Delivery

    public function actionMakeDelivery(){
                
        $resp=['status'=>0,'message'=>'Data Not save'];
        $order = ChickenOrder::find()->where(['id'=>Yii::$app->request->post('order_id')])->one();
        $order->status = '4';
        $order->save();
        $resp =['status'=>1,'message'=>'Package Delivered'];
        return $resp;
    }

    // Received Order

    public function actionReceivedPacket(){
        
        $resp=['status'=>0,'message'=>'Data Not save'];
        
        $request = Yii::$app->request->post();       

        if ($request) {

            $model = new ChickenReceive();

            $model->order_id = $request['order_id'];
            $model->outlet_id = $request['outlet_id'];
            $model->receive_date = $request['receive_date'];
            $model->comments = $request['comments'];

            if($model->save()){
                $order = ChickenOrder::find()->where(['order_id'=> $request['order_id']])->one();
                $order->status = '5';
                $order->save();
                $resp =['status'=>1,'message'=>'RECEIVED'];
            }
            
        }

    
        return $resp;
    }

    // Product Use

    public function actionProductUse(){
        $resp=['status'=>0,'message'=>'Data  not Update'];
        $order = OrderDetail::find()->where(['order_id'=>Yii::$app->request->post('order_id'),'item_code'=>Yii::$app->request->post('item_code')])->one();
        $order->isconsume =1;
        $order->comments = Yii::$app->request->post('comments');
        $order->save();
        $resp=['status'=>1,'message'=>'Data Update'];
        return $resp;
    }

    //Requested Service

    public function actionServiceRequest(){
        $resp=['status'=>0,'message'=>'Request not save'];

        $request = Yii::$app->request->post();
        
        if ($request) {
            $model = new ChickenService();

            $model->request_service =  $request['request_service'];
            $model->comments =  $request['comments'];
            $model->is_served = 0;
            $model->save(); 
            
            $resp=['status'=>1,'message'=>'Service requested'];
       }
            return  $resp;
    }

    // All Service Requested

    public function actionAllService($is_served=0){
        $service = ChickenService:: find()->where(['is_served'=>$is_served])->all();
        return $service;
    }

    //Service served

    public function actionServedService(){
        $resp=['status'=>0,'message'=>'Data  not Update'];
        $serve = ChickenService::find()->where(['id'=>Yii::$app->request->post('id')])->one();
        $serve->is_served = 1;
        $serve->problem = Yii::$app->request->post('problem','');
        $serve->comments = Yii::$app->request->post('comments','');
        $serve->save();
        $resp=['status'=>1,'message'=>'Service served'];
        return $resp;
    }

    //Inspection Item

    public function actionInspectionOn(){
        $inspection = InspectionItem::find()->all();
        return $inspection;
    }

    //Inspection Response

    public function actionInspectionResponse(){
        $resp=['status'=>0,'message'=>'Data Not save'];
        $request=[];
        $request = Yii::$app->request->post();       

        if ($request) {

            $model = new Inspection();
            $model->outlet_id = $request['outlet_id'];
            $model->inspection_date = $request['inspection_date'];
            $model->inspection_time = $request['inspection_time'];
            $model->location = $request['location'];
            $model->comments = $request['comments'];

            if($model->save()){

                for($i=0;$i<count($request['item']);$i++){
                    $ins = new InspectionResp();
                    $ins->inspection_id=$model->id;
                    $ins->item_no=$request['item'][$i]['item_no'];
                    $ins->value=$request['item'][$i]['value'];
                    $ins->save();
                }
                
                $resp=['status'=>1,'message'=>'Data Save'];
            }

        }
        return  $resp;
    }

    //All Inspection Responses

    public function actionAllResponse(){
        $inspect = InspectionResp::find()->all();
        return $inspect;
    }

}
