<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpesialisPsikologi;

/**
 * SpesialisPsikologiSearch represents the model behind the search form of `app\models\SpesialisPsikologi`.
 */
class SpesialisPsikologiSearch extends SpesialisPsikologi
{
    public $nama_no_rm;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_psikologi', 'created_by', 'updated_by', 'simptom_sakit_kepala', 'simptom_kurang_nafsu_makan', 'simptom_sulit_tidur', 'simptom_mudah_takut', 'simptom_tegang', 'simptom_cemas', 'simptom_gemetar', 'simptom_gangguan_perut', 'simptom_sulit_konsentrasi', 'simptom_sedih', 'simptom_sulit_mengambil_keputusan', 'simptom_kehilangan_minat', 'simptom_merasa_tidak_berguna', 'simptom_mudah_lupa', 'simptom_merasa_bersalah', 'simptom_mudah_lelah', 'simptom_putus_asa', 'simptom_mudah_marah', 'simptom_mudah_tersinggung', 'simptom_mimpi_buruk', 'simptom_tidak_percaya_diri'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'rs_pendukung', 'dokter', 'rp_diagnosa_dokter', 'rp_keluhan_fisik', 'rp_keluhan_psikologis', 'asesmen_observasi_du_penampilan_umum', 'asesmen_observasi_du_sikap_terhadap_pemeriksa', 'asesmen_observasi_du_afek', 'asesmen_observasi_du_roman_muka', 'asesmen_observasi_du_proses_pikir', 'asesmen_observasi_du_gangguan_persepsi', 'asesmen_observasi_fp_kognitif_memori', 'asesmen_observasi_fp_kognitif_konsentrasi', 'asesmen_observasi_fp_kognitif_orientasi', 'asesmen_observasi_fp_kognitif_kemampuan_verbal', 'asesmen_observasi_fp_kognitif_emosi', 'asesmen_observasi_fp_kognitif_perilaku', 'psikotes_pendukung_1', 'psikotes_pendukung_2', 'psikotes_pendukung_3', 'psikotes_pendukung_4', 'psikotes_pendukung_5', 'hasil_tes', 'dinamika_psikologi', 'kesimpulan'], 'safe'],
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
        $query = SpesialisPsikologi::find()->joinWith('pasien');;

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
            'id_spesialis_psikologi' => $this->id_spesialis_psikologi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'simptom_sakit_kepala' => $this->simptom_sakit_kepala,
            'simptom_kurang_nafsu_makan' => $this->simptom_kurang_nafsu_makan,
            'simptom_sulit_tidur' => $this->simptom_sulit_tidur,
            'simptom_mudah_takut' => $this->simptom_mudah_takut,
            'simptom_tegang' => $this->simptom_tegang,
            'simptom_cemas' => $this->simptom_cemas,
            'simptom_gemetar' => $this->simptom_gemetar,
            'simptom_gangguan_perut' => $this->simptom_gangguan_perut,
            'simptom_sulit_konsentrasi' => $this->simptom_sulit_konsentrasi,
            'simptom_sedih' => $this->simptom_sedih,
            'simptom_sulit_mengambil_keputusan' => $this->simptom_sulit_mengambil_keputusan,
            'simptom_kehilangan_minat' => $this->simptom_kehilangan_minat,
            'simptom_merasa_tidak_berguna' => $this->simptom_merasa_tidak_berguna,
            'simptom_mudah_lupa' => $this->simptom_mudah_lupa,
            'simptom_merasa_bersalah' => $this->simptom_merasa_bersalah,
            'simptom_mudah_lelah' => $this->simptom_mudah_lelah,
            'simptom_putus_asa' => $this->simptom_putus_asa,
            'simptom_mudah_marah' => $this->simptom_mudah_marah,
            'simptom_mudah_tersinggung' => $this->simptom_mudah_tersinggung,
            'simptom_mimpi_buruk' => $this->simptom_mimpi_buruk,
            'simptom_tidak_percaya_diri' => $this->simptom_tidak_percaya_diri,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'no_daftar', $this->rs_pendukung])
            ->andFilterWhere(['ilike', 'rs_pendukung', $this->rs_pendukung])
            ->andFilterWhere(['ilike', 'dokter', $this->dokter])
            ->andFilterWhere(['ilike', 'rp_diagnosa_dokter', $this->rp_diagnosa_dokter])
            ->andFilterWhere(['ilike', 'rp_keluhan_fisik', $this->rp_keluhan_fisik])
            ->andFilterWhere(['ilike', 'rp_keluhan_psikologis', $this->rp_keluhan_psikologis])
            ->andFilterWhere(['ilike', 'asesmen_observasi_du_penampilan_umum', $this->asesmen_observasi_du_penampilan_umum])
            ->andFilterWhere(['ilike', 'asesmen_observasi_du_sikap_terhadap_pemeriksa', $this->asesmen_observasi_du_sikap_terhadap_pemeriksa])
            ->andFilterWhere(['ilike', 'asesmen_observasi_du_afek', $this->asesmen_observasi_du_afek])
            ->andFilterWhere(['ilike', 'asesmen_observasi_du_roman_muka', $this->asesmen_observasi_du_roman_muka])
            ->andFilterWhere(['ilike', 'asesmen_observasi_du_proses_pikir', $this->asesmen_observasi_du_proses_pikir])
            ->andFilterWhere(['ilike', 'asesmen_observasi_du_gangguan_persepsi', $this->asesmen_observasi_du_gangguan_persepsi])
            ->andFilterWhere(['ilike', 'asesmen_observasi_fp_kognitif_memori', $this->asesmen_observasi_fp_kognitif_memori])
            ->andFilterWhere(['ilike', 'asesmen_observasi_fp_kognitif_konsentrasi', $this->asesmen_observasi_fp_kognitif_konsentrasi])
            ->andFilterWhere(['ilike', 'asesmen_observasi_fp_kognitif_orientasi', $this->asesmen_observasi_fp_kognitif_orientasi])
            ->andFilterWhere(['ilike', 'asesmen_observasi_fp_kognitif_kemampuan_verbal', $this->asesmen_observasi_fp_kognitif_kemampuan_verbal])
            ->andFilterWhere(['ilike', 'asesmen_observasi_fp_kognitif_emosi', $this->asesmen_observasi_fp_kognitif_emosi])
            ->andFilterWhere(['ilike', 'asesmen_observasi_fp_kognitif_perilaku', $this->asesmen_observasi_fp_kognitif_perilaku])
            ->andFilterWhere(['ilike', 'psikotes_pendukung_1', $this->psikotes_pendukung_1])
            ->andFilterWhere(['ilike', 'psikotes_pendukung_2', $this->psikotes_pendukung_2])
            ->andFilterWhere(['ilike', 'psikotes_pendukung_3', $this->psikotes_pendukung_3])
            ->andFilterWhere(['ilike', 'psikotes_pendukung_4', $this->psikotes_pendukung_4])
            ->andFilterWhere(['ilike', 'psikotes_pendukung_5', $this->psikotes_pendukung_5])
            ->andFilterWhere(['ilike', 'hasil_tes', $this->hasil_tes])
            ->andFilterWhere(['ilike', 'dinamika_psikologi', $this->dinamika_psikologi])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere([
                'or',
                ['ilike', DataLayanan::tableName() . '.no_rekam_medik', $this->nama_no_rm],
                ['ilike', DataLayanan::tableName() . '.nama', $this->nama_no_rm]
            ]);

        return $dataProvider;
    }
}
