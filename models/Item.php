<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $chicken_item_name
 * @property integer $price
 * @property string $item_image
 * @property integer $vat
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chicken_item_name', 'price', 'item_image', 'vat'], 'required'],
            [['price', 'vat'], 'integer'],
            [['chicken_item_name', 'item_image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chicken_item_name' => 'Chicken Item Name',
            'price' => 'Price',
            'item_image' => 'Item Image',
            'vat' => 'Vat',
        ];
    }
}
