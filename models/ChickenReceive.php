<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chicken_receive".
 *
 * @property integer $id
 * @property string $outlet_id
 * @property string $comments
 * @property string $receive_date
 * @property integer $order_id
 */
class ChickenReceive extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chicken_receive';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comments'], 'string'],
            [['receive_date'], 'safe'],
            [['order_id'], 'required'],
            [['order_id'], 'integer'],
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
            'comments' => 'Comments',
            'receive_date' => 'Receive Date',
            'order_id' => 'Order ID',
        ];
    }
}
