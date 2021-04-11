<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChickenReceive;

/**
 * ChickenReceiveSearch represents the model behind the search form about `app\models\ChickenReceive`.
 */
class ChickenReceiveSearch extends ChickenReceive
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id'], 'integer'],
            [['outlet_id', 'comments', 'receive_date'], 'safe'],
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
        $query = ChickenReceive::find();

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
            'receive_date' => $this->receive_date,
            'order_id' => $this->order_id,
        ]);

        $query->andFilterWhere(['like', 'outlet_id', $this->outlet_id])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
