<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chicken_outlet".
 *
 * @property integer $id
 * @property string $outlet_id
 * @property string $outlet_name
 * @property string $outlet_address
 * @property string $outlet_phone
 * @property string $tax_id
 */
class ChickenOutlet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chicken_outlet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['outlet_id', 'outlet_name', 'outlet_address', 'outlet_phone', 'tax_id'], 'required'],
            [['outlet_address'], 'string'],
            [['outlet_id', 'outlet_name', 'outlet_phone', 'tax_id'], 'string', 'max' => 255]
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
            'outlet_name' => 'Outlet Name',
            'outlet_address' => 'Outlet Address',
            'outlet_phone' => 'Outlet Phone',
            'tax_id' => 'Vat ID',
        ];
    }
}
