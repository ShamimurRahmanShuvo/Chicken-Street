<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChickenPacket;

/**
 * ChickenPacketSearch represents the model behind the search form about `app\models\ChickenPacket`.
 */
class ChickenPacketSearch extends ChickenPacket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id'], 'integer'],
            [['packet_id', 'production_date', 'expire_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ChickenPacket::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'order_id' => $this->order_id,
            'production_date' => $this->production_date,
            'expire_date' => $this->expire_date,
        ]);

        $query->andFilterWhere(['like', 'packet_id', $this->packet_id]);

        return $dataProvider;
    }
}
