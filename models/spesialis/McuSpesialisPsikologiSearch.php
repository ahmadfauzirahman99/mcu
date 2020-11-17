<?php

namespace app\models\spesialis;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuSpesialisPsikologi;

/**
 * McuSpesialisPsikologiSearch represents the model behind the search form of `app\models\spesialis\McuSpesialisPsikologi`.
 */
class McuSpesialisPsikologiSearch extends McuSpesialisPsikologi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_psikologi', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'no_daftar', 'created_at', 'updated_at', 'pendidikan', 'alamat', 'jenis_kelamin', 'urutan_kelahiran', 'agama', 'status', 'pekerjaan', 'tgl_pemeriksaan', 'diagnosa_dokter', 'keluhan_fisik', 'keluhan_psikologis', 'penampilan_umum', 'sikap_terhadap_pemeriksa', 'afek', 'roman_muka', 'proses_pikir', 'gangguan_persepsi', 'kognitif_memori', 'kognitif_konsentrasi', 'kognitif_orientasi', 'kognitif_kemampuan_verbal', 'emosi', 'perilaku', 'simptom', 'pendukung_1', 'pendukung_2', 'pendukung_3', 'pendukung_4', 'pendukung_5', 'pendukung_hasil_tes', 'dinamika_psikologi', 'kesimpulan', 'riwayat', 'kesan', 'status_pemeriksaan'], 'safe'],
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
        $query = McuSpesialisPsikologi::find();

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
            'id_spesialis_psikologi' => $this->id_spesialis_psikologi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['ilike', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['ilike', 'alamat', $this->alamat])
            ->andFilterWhere(['ilike', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['ilike', 'urutan_kelahiran', $this->urutan_kelahiran])
            ->andFilterWhere(['ilike', 'agama', $this->agama])
            ->andFilterWhere(['ilike', 'status', $this->status])
            ->andFilterWhere(['ilike', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['ilike', 'tgl_pemeriksaan', $this->tgl_pemeriksaan])
            ->andFilterWhere(['ilike', 'diagnosa_dokter', $this->diagnosa_dokter])
            ->andFilterWhere(['ilike', 'keluhan_fisik', $this->keluhan_fisik])
            ->andFilterWhere(['ilike', 'keluhan_psikologis', $this->keluhan_psikologis])
            ->andFilterWhere(['ilike', 'penampilan_umum', $this->penampilan_umum])
            ->andFilterWhere(['ilike', 'sikap_terhadap_pemeriksa', $this->sikap_terhadap_pemeriksa])
            ->andFilterWhere(['ilike', 'afek', $this->afek])
            ->andFilterWhere(['ilike', 'roman_muka', $this->roman_muka])
            ->andFilterWhere(['ilike', 'proses_pikir', $this->proses_pikir])
            ->andFilterWhere(['ilike', 'gangguan_persepsi', $this->gangguan_persepsi])
            ->andFilterWhere(['ilike', 'kognitif_memori', $this->kognitif_memori])
            ->andFilterWhere(['ilike', 'kognitif_konsentrasi', $this->kognitif_konsentrasi])
            ->andFilterWhere(['ilike', 'kognitif_orientasi', $this->kognitif_orientasi])
            ->andFilterWhere(['ilike', 'kognitif_kemampuan_verbal', $this->kognitif_kemampuan_verbal])
            ->andFilterWhere(['ilike', 'emosi', $this->emosi])
            ->andFilterWhere(['ilike', 'perilaku', $this->perilaku])
            ->andFilterWhere(['ilike', 'simptom', $this->simptom])
            ->andFilterWhere(['ilike', 'pendukung_1', $this->pendukung_1])
            ->andFilterWhere(['ilike', 'pendukung_2', $this->pendukung_2])
            ->andFilterWhere(['ilike', 'pendukung_3', $this->pendukung_3])
            ->andFilterWhere(['ilike', 'pendukung_4', $this->pendukung_4])
            ->andFilterWhere(['ilike', 'pendukung_5', $this->pendukung_5])
            ->andFilterWhere(['ilike', 'pendukung_hasil_tes', $this->pendukung_hasil_tes])
            ->andFilterWhere(['ilike', 'dinamika_psikologi', $this->dinamika_psikologi])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere(['ilike', 'riwayat', $this->riwayat])
            ->andFilterWhere(['ilike', 'kesan', $this->kesan])
            ->andFilterWhere(['ilike', 'status_pemeriksaan', $this->status_pemeriksaan]);

        return $dataProvider;
    }
}
