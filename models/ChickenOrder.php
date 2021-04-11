<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chicken_order".
 *
 * @property integer $id
 * @property string $outlet_id
 * @property string $order_date
 * @property integer $status
 */
class ChickenOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chicken_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['outlet_id', 'order_date'], 'required'],
            [['order_date'], 'safe'],
            [['status'], 'integer'],
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
            'order_date' => 'Order Date',
            'status' => 'Status',
        ];
    }
}
