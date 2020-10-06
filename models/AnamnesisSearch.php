<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Anamnesis;

/**
 * AnamnesisSearch represents the model behind the search form of `app\models\Anamnesis`.
 */
class AnamnesisSearch extends Anamnesis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_anamnesis', 'nomor_rekam_medik', 'g', 'p', 'a', 'h'], 'integer'],
            [['jawaban1', 'jawaban2', 'jawaban3', 'jawaban4', 'jawaban5', 'jawaban6', 'jawaban7', 'jawaban8'], 'safe'],
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
        $query = Anamnesis::find();

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
            'id_anamnesis' => $this->id_anamnesis,
            'nomor_rekam_medik' => $this->nomor_rekam_medik,
            'g' => $this->g,
            'p' => $this->p,
            'a' => $this->a,
            'h' => $this->h,
        ]);

        $query->andFilterWhere(['ilike', 'jawaban1', $this->jawaban1])
            ->andFilterWhere(['ilike', 'jawaban2', $this->jawaban2])
            ->andFilterWhere(['ilike', 'jawaban3', $this->jawaban3])
            ->andFilterWhere(['ilike', 'jawaban4', $this->jawaban4])
            ->andFilterWhere(['ilike', 'jawaban5', $this->jawaban5])
            ->andFilterWhere(['ilike', 'jawaban6', $this->jawaban6])
            ->andFilterWhere(['ilike', 'jawaban7', $this->jawaban7])
            ->andFilterWhere(['ilike', 'jawaban8', $this->jawaban8]);

        return $dataProvider;
    }
}
