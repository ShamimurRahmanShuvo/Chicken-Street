<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ChickenService;

/**
 * ChickenServiceSearch represents the model behind the search form about `app\models\ChickenService`.
 */
class ChickenServiceSearch extends ChickenService
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_served'], 'integer'],
            [['request_service', 'problem', 'comments'], 'safe'],
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
        $query = ChickenService::find();

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
            'is_served' => $this->is_served,
        ]);

        $query->andFilterWhere(['like', 'request_service', $this->request_service])
            ->andFilterWhere(['like', 'problem', $this->problem])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
