<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pos_order".
 *
 * @property integer $id
 * @property integer $item_id
 * @property integer $quantity
 * @property string $outlet_id
 * @property string $order_date
 */
class PosOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pos_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'quantity', 'outlet_id', 'order_date'], 'required'],
            [['item_id', 'quantity'], 'integer'],
            [['order_date'], 'safe'],
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
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'outlet_id' => 'Outlet ID',
            'order_date' => 'Order Date',
        ];
    }
}
