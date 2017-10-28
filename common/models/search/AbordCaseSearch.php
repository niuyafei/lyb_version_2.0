<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AbordCase;

/**
 * AbordCaseSearch represents the model behind the search form about `common\models\AbordCase`.
 */
class AbordCaseSearch extends AbordCase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id', 'user_id', 'applicationProject', 'status'], 'integer'],
            [['grade', 'currentSchool', 'admissionSchool', 'admissionMajor', 'specialty', 'winning', 'sat', 'toefl', 'act', 'gpa', 'ielts', 'created_at'], 'safe'],
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
        $query = AbordCase::find();

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
            'case_id' => $this->case_id,
            'user_id' => $this->user_id,
            'applicationProject' => $this->applicationProject,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'grade', $this->grade])
            ->andFilterWhere(['like', 'currentSchool', $this->currentSchool])
            ->andFilterWhere(['like', 'admissionSchool', $this->admissionSchool])
            ->andFilterWhere(['like', 'admissionMajor', $this->admissionMajor])
            ->andFilterWhere(['like', 'specialty', $this->specialty])
            ->andFilterWhere(['like', 'winning', $this->winning])
            ->andFilterWhere(['like', 'sat', $this->sat])
            ->andFilterWhere(['like', 'toefl', $this->toefl])
            ->andFilterWhere(['like', 'act', $this->act])
            ->andFilterWhere(['like', 'gpa', $this->gpa])
            ->andFilterWhere(['like', 'ielts', $this->ielts]);

        return $dataProvider;
    }
}
