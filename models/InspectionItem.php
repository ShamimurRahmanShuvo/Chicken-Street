<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspection_item".
 *
 * @property integer $id
 * @property string $inspection_name
 */
class InspectionItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inspection_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inspection_name'], 'required'],
            [['inspection_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inspection_name' => 'Inspection Name',
        ];
    }
}
