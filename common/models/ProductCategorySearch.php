<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductCategory;

/**
 * ProductCategorySearch represents the model behind the search form about `common\models\ProductCategory`.
 */
class ProductCategorySearch extends ProductCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'product_category_id', 'product_category_parent_id', 'product_category_name', 'product_category_tag', 'product_category_keywords', 'product_category_icon', 'product_category_icon_mobile', 'product_category_create_date', 'product_category_create_user_id', 'product_category_last_update_date', 'product_category_last_update_user_id', 'product_category_status', 'merchant_brand_fk'], 'safe'],
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
        $query = ProductCategory::find();

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
            ->andFilterWhere(['like', 'product_category_id', $this->product_category_id])
            ->andFilterWhere(['like', 'product_category_parent_id', $this->product_category_parent_id])
            ->andFilterWhere(['like', 'product_category_name', $this->product_category_name])
            ->andFilterWhere(['like', 'product_category_tag', $this->product_category_tag])
            ->andFilterWhere(['like', 'product_category_keywords', $this->product_category_keywords])
            ->andFilterWhere(['like', 'product_category_icon', $this->product_category_icon])
            ->andFilterWhere(['like', 'product_category_icon_mobile', $this->product_category_icon_mobile])
            ->andFilterWhere(['like', 'product_category_create_date', $this->product_category_create_date])
            ->andFilterWhere(['like', 'product_category_create_user_id', $this->product_category_create_user_id])
            ->andFilterWhere(['like', 'product_category_last_update_date', $this->product_category_last_update_date])
            ->andFilterWhere(['like', 'product_category_last_update_user_id', $this->product_category_last_update_user_id])
            ->andFilterWhere(['like', 'product_category_status', $this->product_category_status])
            ->andFilterWhere(['like', 'merchant_brand_fk', $this->merchant_brand_fk]);

        return $dataProvider;
    }
}
