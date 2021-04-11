<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspection_resp".
 *
 * @property integer $id
 * @property integer $inspection_id
 * @property string $item_no
 * @property string $value
 */
class InspectionResp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inspection_resp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inspection_id', 'item_no', 'value'], 'required'],
            [['inspection_id'], 'integer'],
            [['item_no', 'value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inspection_id' => 'Inspection ID',
            'item_no' => 'Item No',
            'value' => 'Value',
        ];
    }
}
