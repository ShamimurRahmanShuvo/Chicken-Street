<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pos_report".
 *
 * @property integer $id
 * @property string $outlet_id
 * @property integer $item_id
 * @property integer $item_price
 * @property integer $last_night_stock
 * @property integer $delivery
 * @property integer $sale
 * @property integer $waste
 * @property string $date
 */
class PosReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pos_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['outlet_id', 'item_id', 'item_price', 'last_night_stock', 'delivery', 'sale', 'waste', 'date'], 'required'],
            [['item_id', 'item_price', 'last_night_stock', 'delivery', 'sale', 'waste'], 'integer'],
            [['date'], 'safe'],
            [['outlet_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'outlet_id' => 'Outlet ID',
            'item_id' => 'Item ID',
            'item_price' => 'Item Price',
            'last_night_stock' => 'Last Night Stock',
            'delivery' => 'Delivery',
            'sale' => 'Sale',
            'waste' => 'Waste',
            'date' => 'Date',
        ];
    }
}
