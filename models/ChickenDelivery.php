<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chicken_delivery".
 *
 * @property integer $id
 * @property string $delivery_id
 * @property string $packet_id
 * @property string $outlet_id
 * @property string $delivery_date
 */
class ChickenDelivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chicken_delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_id', 'packet_id', 'outlet_id', 'delivery_date'], 'required'],
            [['delivery_date'], 'safe'],
            [['delivery_id', 'packet_id', 'outlet_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_id' => 'Delivery ID',
            'packet_id' => 'Packet ID',
            'outlet_id' => 'Outlet ID',
            'delivery_date' => 'Delivery Date',
        ];
    }
}
