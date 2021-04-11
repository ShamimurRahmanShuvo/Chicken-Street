<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PosReport;

/**
 * PosReportSearch represents the model behind the search form about `app\models\PosReport`.
 */
class PosReportSearch extends PosReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'item_price', 'last_night_stock', 'delivery', 'sale', 'waste'], 'integer'],
            [['outlet_id', 'date'], 'safe'],
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
        $query = PosReport::find();

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
            'item_id' => $this->item_id,
            'item_price' => $this->item_price,
            'last_night_stock' => $this->last_night_stock,
            'delivery' => $this->delivery,
            'sale' => $this->sale,
            'waste' => $this->waste,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'outlet_id', $this->outlet_id]);

        return $dataProvider;
    }
}
