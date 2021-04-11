<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inspection".
 *
 * @property integer $id
 * @property string $outlet_id
 * @property string $inspection_date
 * @property string $inspection_time
 * @property string $location
 * @property string $comments
 */
class Inspection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inspection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['outlet_id', 'inspection_date', 'inspection_time', 'location', 'comments'], 'required'],
            [['inspection_date', 'inspection_time'], 'safe'],
            [['location', 'comments'], 'string'],
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
            'inspection_date' => 'Inspection Date',
            'inspection_time' => 'Inspection Time',
            'location' => 'Location',
            'comments' => 'Comments',
        ];
    }
}
