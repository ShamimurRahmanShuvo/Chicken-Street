<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chicken_packet".
 *
 * @property integer $id
 * @property integer $order_id
 * @property string $packet_id
 * @property string $production_date
 * @property string $expire_date
 */
class ChickenPacket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chicken_packet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id'], 'required'],
            [['order_id'], 'integer'],
            [['production_date', 'expire_date'], 'safe'],
            [['packet_id'], 'string', 'max' => 255]
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
            'packet_id' => 'Packet ID',
            'production_date' => 'Production Date',
            'expire_date' => 'Expire Date',
        ];
    }
}
