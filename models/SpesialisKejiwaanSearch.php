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
    public $nama_no_rm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_kejiwaan', 'created_by', 'updated_by', 'status'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'rs_pendukung', 'dokter', 'skala_l', 'skala_p', 'skala_k', 'skala_1_hs', 'skala_2_d', 'skala_3_hy', 'skala_4_pd', 'skala_5_mf', 'skala_6_pa', 'skala_7_pt', 'skala_8_sc', 'skala_9_ma', 'skala_0_si', 'validitas', 'interpretasi_subtantif', 'saran', 'kesimpulan'], 'safe'],
            ['nama_no_rm', 'safe'],
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
        $query = SpesialisKejiwaan::find()->joinWith('pasien');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nama_no_rm'] = [
            'asc' => [DataLayanan::tableName() . '.nama' => SORT_ASC],
            'desc' => [DataLayanan::tableName() . '.nama' => SORT_DESC],
        ];

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
            ->andFilterWhere(['ilike', 'validitas', $this->validitas])
            ->andFilterWhere(['ilike', 'interpretasi_subtantif', $this->interpretasi_subtantif])
            ->andFilterWhere(['ilike', 'saran', $this->saran])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere(['ilike', 'status', $this->status])
            ->andFilterWhere([
                'or',
                ['ilike', DataLayanan::tableName() . '.no_rekam_medik', $this->nama_no_rm],
                ['ilike', DataLayanan::tableName() . '.nama', $this->nama_no_rm]
            ]);
        return $dataProvider;
    }
}
