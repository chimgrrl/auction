<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductSpecification;

/**
 * ProductSpecificationSearch represents the model behind the search form about `common\models\ProductSpecification`.
 */
class ProductSpecificationSearch extends ProductSpecification
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'product_specification_id', 'product_specification_name', 'product_specification_tag', 'product_specification_prefix', 'product_specification_value_price', 'product_specification_create_date', 'product_specification_create_user_id', 'product_specification_last_update_date', 'product_specification_last_update_user_id', 'product_specification_status', 'merchant_brand_fk'], 'safe'],
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
        $query = ProductSpecification::find();

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
            ->andFilterWhere(['like', 'product_specification_id', $this->product_specification_id])
            ->andFilterWhere(['like', 'product_specification_name', $this->product_specification_name])
            ->andFilterWhere(['like', 'product_specification_tag', $this->product_specification_tag])
            ->andFilterWhere(['like', 'product_specification_prefix', $this->product_specification_prefix])
            ->andFilterWhere(['like', 'product_specification_value_price', $this->product_specification_value_price])
            ->andFilterWhere(['like', 'product_specification_create_date', $this->product_specification_create_date])
            ->andFilterWhere(['like', 'product_specification_create_user_id', $this->product_specification_create_user_id])
            ->andFilterWhere(['like', 'product_specification_last_update_date', $this->product_specification_last_update_date])
            ->andFilterWhere(['like', 'product_specification_last_update_user_id', $this->product_specification_last_update_user_id])
            ->andFilterWhere(['like', 'product_specification_status', $this->product_specification_status])
            ->andFilterWhere(['like', 'merchant_brand_fk', $this->merchant_brand_fk]);

        return $dataProvider;
    }
}
