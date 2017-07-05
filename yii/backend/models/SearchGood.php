<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Good;

/**
 * SearchGood represents the model behind the search form about `common\models\Good`.
 */
class SearchGood extends Good
{

    public function attributes()
    {
    // делаем поле зависимости доступным для поиска
    return array_merge(parent::attributes(), ['catalog.ctitle']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'catalog_id', 'promo'], 'integer'],
            [['gtitle', 'gdescription', 'catalog.ctitle'], 'safe'],

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
        $query = Good::find();

        // присоединяем зависимость `catalog` которая является связью с таблицей `catalog`
        // и устанавливаем алиас таблицы в значение `catalog`
        $query->joinWith(['catalog' => function($query) { $query->from(['catalog' => 'catalog']); }]);
        
         $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
		
        
        // добавляем сортировку по колонке из зависимости
        $dataProvider->sort->attributes['catalog.ctitle'] = [
        'asc' => ['catalog.ctitle' => SORT_ASC],
        'desc' => ['catalog.ctitle' => SORT_DESC],
        ];
        
        // add conditions that should always apply here



        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'catalog_id' => $this->catalog_id,
            'promo' => $this->promo,
        ]);

        $query->andFilterWhere(['like', 'gtitle', $this->gtitle])
            ->andFilterWhere(['like', 'gdescription', $this->gdescription])
            ->andFilterWhere(['like', 'catalog.ctitle', $this->getAttribute('catalog.ctitle')]);

        return $dataProvider;
    }
}
