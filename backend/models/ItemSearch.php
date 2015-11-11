<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Item;

/**
 * ItemSearch represents the model behind the search form about `backend\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['id'], 'integer'],
        [['itemname','categoryID'], 'safe'],
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
        $query = Item::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            ]);

        $this->load($params);

            if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0 =1');
            return $dataProvider;
            }
        $query->joinWith('category');
        $query->andFilterWhere([
            'id' => $this->id,
            //'categoryID' => $this->categoryID,
            ]);

        $query->andFilterWhere(['like', 'itemname', $this->itemname])
            ->andFilterWhere(['like', 'category.name', $this->categoryID]);

        return $dataProvider;
    }
}
