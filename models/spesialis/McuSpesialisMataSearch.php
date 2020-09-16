<?php

namespace app\models\spesialis;

use app\models\DataLayanan;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuSpesialisMata;

/**
 * McuSpesialisMataSearch represents the model behind the search form of `app\models\spesialis\McuSpesialisMata`.
 */
class McuSpesialisMataSearch extends McuSpesialisMata
{
    public $nama_no_rm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_mata', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'persepsi_warna_mata_kanan', 'persepsi_warna_mata_kiri', 'kelopak_mata_kanan', 'kelopak_mata_kiri', 'konjungtiva_mata_kanan', 'konjungtiva_mata_kiri', 'kesegarisan_gerak_bola_mata_kanan', 'kesegarisan_gerak_bola_mata_kiri', 'skiera_mata_kanan', 'skiera_mata_kiri', 'lensa_mata_kanan', 'lensa_mata_kiri', 'kornea_mata_kanan', 'kornea_mata_kiri', 'bulu_mata_kanan', 'bulu_mata_kiri', 'tekanan_bola_mata_kanan', 'tekanan_bola_mata_kiri', 'penglihatan_3_dimensi_mata_kanan', 'penglihatan_3_dimensi_mata_kiri', 'virus_mata_tanpa_koreksi_mata_kanan', 'virus_mata_tanpa_koreksi_mata_kiri', 'virus_mata_dengan_koreksi_mata_kanan', 'virus_mata_dengan_koreksi_mata_kiri', 'lain_lain', 'kesimpulan', 'riwayat'], 'safe'],
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
        $query = McuSpesialisMata::find();

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
            'id_spesialis_mata' => $this->id_spesialis_mata,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'persepsi_warna_mata_kanan', $this->persepsi_warna_mata_kanan])
            ->andFilterWhere(['ilike', 'persepsi_warna_mata_kiri', $this->persepsi_warna_mata_kiri])
            ->andFilterWhere(['ilike', 'kelopak_mata_kanan', $this->kelopak_mata_kanan])
            ->andFilterWhere(['ilike', 'kelopak_mata_kiri', $this->kelopak_mata_kiri])
            ->andFilterWhere(['ilike', 'konjungtiva_mata_kanan', $this->konjungtiva_mata_kanan])
            ->andFilterWhere(['ilike', 'konjungtiva_mata_kiri', $this->konjungtiva_mata_kiri])
            ->andFilterWhere(['ilike', 'kesegarisan_gerak_bola_mata_kanan', $this->kesegarisan_gerak_bola_mata_kanan])
            ->andFilterWhere(['ilike', 'kesegarisan_gerak_bola_mata_kiri', $this->kesegarisan_gerak_bola_mata_kiri])
            ->andFilterWhere(['ilike', 'skiera_mata_kanan', $this->skiera_mata_kanan])
            ->andFilterWhere(['ilike', 'skiera_mata_kiri', $this->skiera_mata_kiri])
            ->andFilterWhere(['ilike', 'lensa_mata_kanan', $this->lensa_mata_kanan])
            ->andFilterWhere(['ilike', 'lensa_mata_kiri', $this->lensa_mata_kiri])
            ->andFilterWhere(['ilike', 'kornea_mata_kanan', $this->kornea_mata_kanan])
            ->andFilterWhere(['ilike', 'kornea_mata_kiri', $this->kornea_mata_kiri])
            ->andFilterWhere(['ilike', 'bulu_mata_kanan', $this->bulu_mata_kanan])
            ->andFilterWhere(['ilike', 'bulu_mata_kiri', $this->bulu_mata_kiri])
            ->andFilterWhere(['ilike', 'tekanan_bola_mata_kanan', $this->tekanan_bola_mata_kanan])
            ->andFilterWhere(['ilike', 'tekanan_bola_mata_kiri', $this->tekanan_bola_mata_kiri])
            ->andFilterWhere(['ilike', 'penglihatan_3_dimensi_mata_kanan', $this->penglihatan_3_dimensi_mata_kanan])
            ->andFilterWhere(['ilike', 'penglihatan_3_dimensi_mata_kiri', $this->penglihatan_3_dimensi_mata_kiri])
            ->andFilterWhere(['ilike', 'virus_mata_tanpa_koreksi_mata_kanan', $this->virus_mata_tanpa_koreksi_mata_kanan])
            ->andFilterWhere(['ilike', 'virus_mata_tanpa_koreksi_mata_kiri', $this->virus_mata_tanpa_koreksi_mata_kiri])
            ->andFilterWhere(['ilike', 'virus_mata_dengan_koreksi_mata_kanan', $this->virus_mata_dengan_koreksi_mata_kanan])
            ->andFilterWhere(['ilike', 'virus_mata_dengan_koreksi_mata_kiri', $this->virus_mata_dengan_koreksi_mata_kiri])
            ->andFilterWhere(['ilike', 'lain_lain', $this->lain_lain])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere(['ilike', 'riwayat', $this->riwayat])
            ->andFilterWhere([
                'or',
                ['ilike', DataLayanan::tableName() . '.no_rekam_medik', $this->nama_no_rm],
                ['ilike', DataLayanan::tableName() . '.nama', $this->nama_no_rm]
            ]);

        return $dataProvider;
    }
}
