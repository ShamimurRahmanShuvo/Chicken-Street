<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inspection;

/**
 * InspectionSearch represents the model behind the search form about `app\models\Inspection`.
 */
class InspectionSearch extends Inspection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['outlet_id', 'inspection_date', 'inspection_time', 'location', 'comments'], 'safe'],
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
        $query = Inspection::find();

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
            'inspection_date' => $this->inspection_date,
            'inspection_time' => $this->inspection_time,
        ]);

        $query->andFilterWhere(['like', 'outlet_id', $this->outlet_id])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
