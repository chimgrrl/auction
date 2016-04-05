<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MerchantBrand;

/**
 * MerchantBrandSearch represents the model behind the search form about `common\models\MerchantBrand`.
 */
class MerchantBrandSearch extends MerchantBrand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'merchant_brand_id', 'merchant_brand_name1', 'merchant_brand_name2', 'merchant_brand_tag', 'merchant_brand_url', 'merchant_brand_official_url', 'merchant_brand_email', 'merchant_brand_logo_img', 'merchant_brand_logo_img_mobile', 'merchant_brand_search_keywords', 'merchant_brand_create_date', 'merchant_brand_create_user_id', 'merchant_brand_last_update_date', 'merchant_brand_last_update_user_id', 'merchant_brand_status'], 'safe'],
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
        $query = MerchantBrand::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [
				'pagesize' => 10,
			],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'merchant_brand_id', $this->merchant_brand_id])
            ->andFilterWhere(['like', 'merchant_brand_name1', $this->merchant_brand_name1])
            ->andFilterWhere(['like', 'merchant_brand_name2', $this->merchant_brand_name2])
            ->andFilterWhere(['like', 'merchant_brand_tag', $this->merchant_brand_tag])
            ->andFilterWhere(['like', 'merchant_brand_url', $this->merchant_brand_url])
            ->andFilterWhere(['like', 'merchant_brand_official_url', $this->merchant_brand_official_url])
            ->andFilterWhere(['like', 'merchant_brand_email', $this->merchant_brand_email])
            ->andFilterWhere(['like', 'merchant_brand_logo_img', $this->merchant_brand_logo_img])
            ->andFilterWhere(['like', 'merchant_brand_logo_img_mobile', $this->merchant_brand_logo_img_mobile])
            ->andFilterWhere(['like', 'merchant_brand_search_keywords', $this->merchant_brand_search_keywords])
            ->andFilterWhere(['like', 'merchant_brand_create_date', $this->merchant_brand_create_date])
            ->andFilterWhere(['like', 'merchant_brand_create_user_id', $this->merchant_brand_create_user_id])
            ->andFilterWhere(['like', 'merchant_brand_last_update_date', $this->merchant_brand_last_update_date])
            ->andFilterWhere(['like', 'merchant_brand_last_update_user_id', $this->merchant_brand_last_update_user_id])
            ->andFilterWhere(['like', 'merchant_brand_status', $this->merchant_brand_status]);

        return $dataProvider;
    }
}
