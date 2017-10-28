<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Plan;

/**
 * PlanSearch represents the model behind the search form about `common\models\Plan`.
 */
class PlanSearch extends Plan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_id', 'applicationProject', 'user_id', 'pay_type', 'status'], 'integer'],
            [['username', 'phone', 'weixin', 'email', 'currentSchool', 'grade', 'graduationSchool', 'major', 'toefl', 'sat', 'act', 'ielts', 'gpa_h', 'gpa_m', 'gpa_u', 'gpa_major', 'ssat', 'gre', 'gmat', 'ap', 'winning', 'communityActivities', 'publicBenefitActivities', 'relatives', 'academicActivities', 'workExperience', 'created_at'], 'safe'],
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
        $query = Plan::find();

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
            'plan_id' => $this->plan_id,
            'applicationProject' => $this->applicationProject,
            'user_id' => $this->user_id,
            'pay_type' => $this->pay_type,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'weixin', $this->weixin])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'currentSchool', $this->currentSchool])
            ->andFilterWhere(['like', 'grade', $this->grade])
            ->andFilterWhere(['like', 'graduationSchool', $this->graduationSchool])
            ->andFilterWhere(['like', 'major', $this->major])
            ->andFilterWhere(['like', 'toefl', $this->toefl])
            ->andFilterWhere(['like', 'sat', $this->sat])
            ->andFilterWhere(['like', 'act', $this->act])
            ->andFilterWhere(['like', 'ielts', $this->ielts])
            ->andFilterWhere(['like', 'gpa_h', $this->gpa_h])
            ->andFilterWhere(['like', 'gpa_m', $this->gpa_m])
            ->andFilterWhere(['like', 'gpa_u', $this->gpa_u])
            ->andFilterWhere(['like', 'gpa_major', $this->gpa_major])
            ->andFilterWhere(['like', 'ssat', $this->ssat])
            ->andFilterWhere(['like', 'gre', $this->gre])
            ->andFilterWhere(['like', 'gmat', $this->gmat])
            ->andFilterWhere(['like', 'ap', $this->ap])
            ->andFilterWhere(['like', 'winning', $this->winning])
            ->andFilterWhere(['like', 'communityActivities', $this->communityActivities])
            ->andFilterWhere(['like', 'publicBenefitActivities', $this->publicBenefitActivities])
            ->andFilterWhere(['like', 'relatives', $this->relatives])
            ->andFilterWhere(['like', 'academicActivities', $this->academicActivities])
            ->andFilterWhere(['like', 'workExperience', $this->workExperience]);

        return $dataProvider;
    }
}
