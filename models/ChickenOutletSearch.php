<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChickenOutlet;

/**
 * ChickenOutletSearch represents the model behind the search form about `app\models\ChickenOutlet`.
 */
class ChickenOutletSearch extends ChickenOutlet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['outlet_id', 'outlet_name', 'outlet_address', 'outlet_phone', 'tax_id'], 'safe'],
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
        $query = ChickenOutlet::find();

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
        ]);

        $query->andFilterWhere(['like', 'outlet_id', $this->outlet_id])
            ->andFilterWhere(['like', 'outlet_name', $this->outlet_name])
            ->andFilterWhere(['like', 'outlet_address', $this->outlet_address])
            ->andFilterWhere(['like', 'outlet_phone', $this->outlet_phone])
            ->andFilterWhere(['like', 'tax_id', $this->tax_id]);

        return $dataProvider;
    }
}
