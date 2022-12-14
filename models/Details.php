<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\housedetails;

/**
 * Details represents the model behind the search form of `app\models\housedetails`.
 */
class Details extends housedetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['House_id', 'location_id', 'price', 'purpose', 'access', 'status'], 'integer'],
            [['house_type',], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = housedetails::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'House_id' => $this->House_id,
            'location_id' => $this->location_id,
            'price' => $this->price,
            'purpose' => $this->purpose,
            'access' => $this->access,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'house_type', $this->house_type]);
            

        return $dataProvider;
    }
}
