<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Production;

/**
 * ProductionSearch represents the model behind the search form about `backend\models\Production`.
 */
class ProductionSearch extends Production
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'promo'], 'integer'],
            [['ptitle', 'pdescription', 'image'], 'safe'],
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
        $query = Production::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
			    'defaultOrder' => [
				    'id' => SORT_DESC,
				
				]
			
			],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_category' => $this->id_category,
            'promo' => $this->promo,
        ]);

        $query->andFilterWhere(['like', 'ptitle', $this->ptitle])
            ->andFilterWhere(['like', 'pdescription', $this->pdescription])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
