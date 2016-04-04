<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'product_id', 'product_name', 'product_model_number', 'product_price', 'product_unit_weight', 'product_unit', 'product_origin', 'product_manufacturer', 'product_available_date', 'product_quantity', 'product_ordered', 'product_create_date', 'product_create_user_id', 'product_last_update_date', 'product_last_update_user_id', 'product_status', 'product_category_fk', 'product_specification_fk', 'merchant_brand_fk'], 'safe'],
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
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'product_id', $this->product_id])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_model_number', $this->product_model_number])
            ->andFilterWhere(['like', 'product_price', $this->product_price])
            ->andFilterWhere(['like', 'product_unit_weight', $this->product_unit_weight])
            ->andFilterWhere(['like', 'product_unit', $this->product_unit])
            ->andFilterWhere(['like', 'product_origin', $this->product_origin])
            ->andFilterWhere(['like', 'product_manufacturer', $this->product_manufacturer])
            ->andFilterWhere(['like', 'product_available_date', $this->product_available_date])
            ->andFilterWhere(['like', 'product_quantity', $this->product_quantity])
            ->andFilterWhere(['like', 'product_ordered', $this->product_ordered])
            ->andFilterWhere(['like', 'product_create_date', $this->product_create_date])
            ->andFilterWhere(['like', 'product_create_user_id', $this->product_create_user_id])
            ->andFilterWhere(['like', 'product_last_update_date', $this->product_last_update_date])
            ->andFilterWhere(['like', 'product_last_update_user_id', $this->product_last_update_user_id])
            ->andFilterWhere(['like', 'product_status', $this->product_status])
            ->andFilterWhere(['like', 'product_category_fk', $this->product_category_fk])
            ->andFilterWhere(['like', 'product_specification_fk', $this->product_specification_fk])
            ->andFilterWhere(['like', 'merchant_brand_fk', $this->merchant_brand_fk]);

        return $dataProvider;
    }
}
