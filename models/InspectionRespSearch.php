<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InspectionResp;

/**
 * InspectionRespSearch represents the model behind the search form about `app\models\InspectionResp`.
 */
class InspectionRespSearch extends InspectionResp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inspection_id'], 'integer'],
            [['item_no', 'value'], 'safe'],
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
        $query = InspectionResp::find();

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
            'inspection_id' => $this->inspection_id,
        ]);

        $query->andFilterWhere(['like', 'item_no', $this->item_no])
            ->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
