<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpesialisNarkoba;

/**
 * SpesialisNarkobaSearch represents the model behind the search form of `app\models\SpesialisNarkoba`.
 */
class SpesialisNarkobaSearch extends SpesialisNarkoba
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_narkoba', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'golongan_psikotropika', 'hasil_psikotropika', 'golongan_narkotika', 'hasil_narkotika'], 'safe'],
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
        $query = SpesialisNarkoba::find();

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
            'id_spesialis_narkoba' => $this->id_spesialis_narkoba,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'golongan_psikotropika', $this->golongan_psikotropika])
            ->andFilterWhere(['ilike', 'hasil_psikotropika', $this->hasil_psikotropika])
            ->andFilterWhere(['ilike', 'golongan_narkotika', $this->golongan_narkotika])
            ->andFilterWhere(['ilike', 'hasil_narkotika', $this->hasil_narkotika]);

        return $dataProvider;
    }
}
