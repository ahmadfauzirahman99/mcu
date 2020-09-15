<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpesialisKejiwaan;

/**
 * SpesialisKejiwaanSearch represents the model behind the search form of `app\models\SpesialisKejiwaan`.
 */
class SpesialisKejiwaanSearch extends SpesialisKejiwaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_kejiwaan', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'rs_pendukung', 'dokter', 'skala_l', 'skala_p', 'skala_k', 'skala_1_hs', 'skala_2_d', 'skala_3_hy', 'skala_4_pd', 'skala_5_mf', 'skala_6_pa', 'skala_7_pt', 'skala_8_sc', 'skala_9_ma', 'skala_0_si', 'kesimpulan'], 'safe'],
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
        $query = SpesialisKejiwaan::find();

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
            'id_spesialis_kejiwaan' => $this->id_spesialis_kejiwaan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'rs_pendukung', $this->rs_pendukung])
            ->andFilterWhere(['ilike', 'dokter', $this->dokter])
            ->andFilterWhere(['ilike', 'skala_l', $this->skala_l])
            ->andFilterWhere(['ilike', 'skala_p', $this->skala_p])
            ->andFilterWhere(['ilike', 'skala_k', $this->skala_k])
            ->andFilterWhere(['ilike', 'skala_1_hs', $this->skala_1_hs])
            ->andFilterWhere(['ilike', 'skala_2_d', $this->skala_2_d])
            ->andFilterWhere(['ilike', 'skala_3_hy', $this->skala_3_hy])
            ->andFilterWhere(['ilike', 'skala_4_pd', $this->skala_4_pd])
            ->andFilterWhere(['ilike', 'skala_5_mf', $this->skala_5_mf])
            ->andFilterWhere(['ilike', 'skala_6_pa', $this->skala_6_pa])
            ->andFilterWhere(['ilike', 'skala_7_pt', $this->skala_7_pt])
            ->andFilterWhere(['ilike', 'skala_8_sc', $this->skala_8_sc])
            ->andFilterWhere(['ilike', 'skala_9_ma', $this->skala_9_ma])
            ->andFilterWhere(['ilike', 'skala_0_si', $this->skala_0_si])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan]);

        return $dataProvider;
    }
}
