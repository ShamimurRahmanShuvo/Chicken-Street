<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $item_code
 * @property integer $quantity
 * @property string $comments
 * @property integer $isconsume
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'item_code', 'quantity'], 'required'],
            [['order_id', 'quantity', 'isconsume'], 'integer'],
            [['comments'], 'string'],
            [['item_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'item_code' => 'Item Code',
            'quantity' => 'Quantity',
            'comments' => 'Comments',
            'isconsume' => 'Isconsume',
        ];
    }
}
