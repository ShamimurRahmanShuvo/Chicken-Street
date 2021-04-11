<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PosOrder;
use yii\data\SqlDataProvider;

/**
 * PosOrderSearch represents the model behind the search form about `app\models\PosOrder`.
 */
class PosOrderSearch extends PosOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'quantity'], 'integer'],
            [['outlet_id', 'order_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    //Pos report

    public function posReport()
    {

        $query = "select report.*,
                    report.delivery+report.last_night_stock opening_stock,
                    report.delivery+report.last_night_stock-report.packet_open closing_stock,
                    report.packet_open-report.sale waste,
                    (report.delivery+report.last_night_stock)*price opening_price,
                    (report.delivery+report.last_night_stock-report.packet_open)*price closing_price,
                    (report.packet_open-report.sale)*price waste_price,
                    delivery*price delivery_price,
                    report.last_night_stock*price last_night_stock_price,
                    report.packet_open*price packet_open_price,
                    report.sale*price sale_price
                    from
                    (select  o.*,IFNULL(pos_report.last_night_stock ,0) last_night_stock
                    from (select item.id,item.chicken_item_name,item.price,
                    poseOrder.order_date,
                    poseOrder.packet_open,
                    poseOrder.delivery,
                    poseOrder.sale
                    from item 
                    left join
                    (SELECT item_id,order_date,
                    sum(if(type=0,quantity,0)) delivery,
                    sum(if(type=1,quantity,0)) packet_open,
                    sum(if(type=2,quantity,0)) sale
                    FROM `pos_order`group by order_date,item_id)
                    poseOrder
                    on 
                    item.id = poseOrder.item_id) o
                    left join
                    pos_report on 
                    o.id= pos_report.item_id) report where order_date = '".$this->order_date."'";

        $dataProvider = new SqlDataProvider([
            'sql' => $query,
        ]);

      
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
    }

    //Pos report Save

    /*public function posReportSave()
    {
        $query = "(select report.*,
                    report.delivery+report.last_night_stock opening_stock,
                    report.delivery+report.last_night_stock-report.packet_open closing_stock,
                    report.packet_open-report.sale waste,
                    (report.delivery+report.last_night_stock)*price opening_price,
                    (report.delivery+report.last_night_stock-report.packet_open)*price closing_price,
                    (report.packet_open-report.sale)*price waste_price,
                    delivery*price delivery_price,
                    report.last_night_stock*price last_night_stock_price,
                    report.packet_open*price packet_open_price,
                    report.sale*price sale_price
                    from
                    (select  o.*,IFNULL(pos_report.last_night_stock ,0) last_night_stock
                    from (select item.id,item.chicken_item_name,item.price,
                    poseOrder.order_date,
                    poseOrder.packet_open,
                    poseOrder.delivery,
                    poseOrder.sale
                    from item 
                    left join
                    (SELECT item_id,order_date,
                    sum(if(type=0,quantity,0)) delivery,
                    sum(if(type=1,quantity,0)) packet_open,
                    sum(if(type=2,quantity,0)) sale
                    FROM `pos_order`group by order_date,item_id)
                    poseOrder
                    on 
                    item.id = poseOrder.item_id) o
                    left join
                    pos_report on 
                    o.id= pos_report.item_id) report)"
    }*/

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PosOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'item_id' => $this->item_id,
            'quantity' => $this->quantity,
            'order_date' => $this->order_date,
        ]);

        $query->andFilterWhere(['like', 'outlet_id', $this->outlet_id]);

        return $dataProvider;
    }
}
