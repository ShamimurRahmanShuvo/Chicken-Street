<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chicken_service".
 *
 * @property integer $id
 * @property string $request_service
 * @property string $problem
 * @property string $comments
 * @property integer $is_served
 */
class ChickenService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chicken_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problem', 'comments'], 'string'],
            [['is_served'], 'required'],
            [['is_served'], 'integer'],
            [['request_service'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_service' => 'Request Service',
            'problem' => 'Problem',
            'comments' => 'Comments',
            'is_served' => 'Is Served',
        ];
    }
}
