<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Membership;

/**
 * MembershipSearch represents the model behind the search form about `common\models\Membership`.
 */
class MembershipSearch extends Membership
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'membership_unique_id', 'membership_login_id', 'membership_first_name', 'membership_last_name', 'membership_gender', 'membership_date_of_birth', 'membership_district', 'membership_address', 'membership_contact_telephone', 'membership_email_address', 'membership_current_points', 'membership_current_reputation', 'membership_date_of_joining', 'membership_status', 'membership_profile_image', 'merchant_brand_fk'], 'safe'],
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
        $query = Membership::find();

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
            ->andFilterWhere(['like', 'membership_unique_id', $this->membership_unique_id])
            ->andFilterWhere(['like', 'membership_login_id', $this->membership_login_id])
            ->andFilterWhere(['like', 'membership_first_name', $this->membership_first_name])
            ->andFilterWhere(['like', 'membership_last_name', $this->membership_last_name])
            ->andFilterWhere(['like', 'membership_gender', $this->membership_gender])
            ->andFilterWhere(['like', 'membership_date_of_birth', $this->membership_date_of_birth])
            ->andFilterWhere(['like', 'membership_district', $this->membership_district])
            ->andFilterWhere(['like', 'membership_address', $this->membership_address])
            ->andFilterWhere(['like', 'membership_contact_telephone', $this->membership_contact_telephone])
            ->andFilterWhere(['like', 'membership_email_address', $this->membership_email_address])
            ->andFilterWhere(['like', 'membership_current_points', $this->membership_current_points])
            ->andFilterWhere(['like', 'membership_current_reputation', $this->membership_current_reputation])
            ->andFilterWhere(['like', 'membership_date_of_joining', $this->membership_date_of_joining])
            ->andFilterWhere(['like', 'membership_status', $this->membership_status])
            ->andFilterWhere(['like', 'merchant_brand_fk', $this->merchant_brand_fk])
            ->andFilterWhere(['like', 'membership_profile_image', $this->membership_profile_image]);

        return $dataProvider;
    }
}
