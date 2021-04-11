<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChickenDelivery;

/**
 * ChickenDeliverySearch represents the model behind the search form about `app\models\ChickenDelivery`.
 */
class ChickenDeliverySearch extends ChickenDelivery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['delivery_id', 'packet_id', 'outlet_id', 'delivery_date'], 'safe'],
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
        $query = ChickenDelivery::find();

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
            'delivery_date' => $this->delivery_date,
        ]);

        $query->andFilterWhere(['like', 'delivery_id', $this->delivery_id])
            ->andFilterWhere(['like', 'packet_id', $this->packet_id])
            ->andFilterWhere(['like', 'outlet_id', $this->outlet_id]);

        return $dataProvider;
    }
}
