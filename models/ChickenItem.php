<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chicken_item".
 *
 * @property integer $id
 * @property string $item_name
 * @property string $item_code
 * @property string $description
 * @property string $pack_image
 */
class ChickenItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chicken_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'item_code', 'description', 'pack_image'], 'required'],
            [['item_name', 'item_code', 'description', 'pack_image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_name' => 'Item Name',
            'item_code' => 'Item Code',
            'description' => 'Description',
            'pack_image' => 'Pack Image',
        ];
    }
}
