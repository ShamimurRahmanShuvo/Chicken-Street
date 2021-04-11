<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Served;

/**
 * ServedSearch represents the model behind the search form about `app\models\Served`.
 */
class ServedSearch extends Served
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_changed'], 'integer'],
            [['served_barcode', 'problem', 'comment'], 'safe'],
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
        $query = Served::find();

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
            'is_changed' => $this->is_changed,
        ]);

        $query->andFilterWhere(['like', 'served_barcode', $this->served_barcode])
            ->andFilterWhere(['like', 'problem', $this->problem])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
