<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChickenOrder;

/**
 * ChickenOrderSearch represents the model behind the search form about `app\models\ChickenOrder`.
 */
class ChickenOrderSearch extends ChickenOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['outlet_id', 'order_date'], 'safe'],
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

        $query = ChickenOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        //var_dump($this->status); die();

        $query->andFilterWhere([
            'id' => $this->id,
            'order_date' => $this->order_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'outlet_id', $this->outlet_id]);

        return $dataProvider;
    }
}
