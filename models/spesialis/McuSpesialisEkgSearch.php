<?php

namespace app\models\spesialis;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuSpesialisEkg;

/**
 * McuSpesialisEkgSearch represents the model behind the search form of `app\models\spesialis\McuSpesialisEkg`.
 */
class McuSpesialisEkgSearch extends McuSpesialisEkg
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_ekg', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'no_daftar', 'created_at', 'updated_at', 'irama_jantung', 'frekuensi_denyut_jantung', 'gelombang_p', 'interval_pr', 'kompleks_qrs', 'segmen_st', 'gelombang_t', 'lain_lain', 'kesan_ekg_istirahat', 'anjuran', 'riwayat', 'kesan', 'status_pemeriksaan'], 'safe'],
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
        $query = McuSpesialisEkg::find();

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
            'id_spesialis_ekg' => $this->id_spesialis_ekg,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['ilike', 'irama_jantung', $this->irama_jantung])
            ->andFilterWhere(['ilike', 'frekuensi_denyut_jantung', $this->frekuensi_denyut_jantung])
            ->andFilterWhere(['ilike', 'gelombang_p', $this->gelombang_p])
            ->andFilterWhere(['ilike', 'interval_pr', $this->interval_pr])
            ->andFilterWhere(['ilike', 'kompleks_qrs', $this->kompleks_qrs])
            ->andFilterWhere(['ilike', 'segmen_st', $this->segmen_st])
            ->andFilterWhere(['ilike', 'gelombang_t', $this->gelombang_t])
            ->andFilterWhere(['ilike', 'lain_lain', $this->lain_lain])
            ->andFilterWhere(['ilike', 'kesan_ekg_istirahat', $this->kesan_ekg_istirahat])
            ->andFilterWhere(['ilike', 'anjuran', $this->anjuran])
            ->andFilterWhere(['ilike', 'riwayat', $this->riwayat])
            ->andFilterWhere(['ilike', 'kesan', $this->kesan])
            ->andFilterWhere(['ilike', 'status_pemeriksaan', $this->status_pemeriksaan]);

        return $dataProvider;
    }
}
