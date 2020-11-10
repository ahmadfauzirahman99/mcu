<?php

namespace app\models\spesialis;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuSpesialisTreadmill;

/**
 * McuSpesialisTreadmillSearch represents the model behind the search form of `app\models\spesialis\McuSpesialisTreadmill`.
 */
class McuSpesialisTreadmillSearch extends McuSpesialisTreadmill
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_treadmill', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'no_daftar', 'created_at', 'updated_at', 'permintaan', 'metode', 'lama_latihan', 'test_dihentikan_karena', 'dj_maksimal', 'td_maksimal', 'ekg_istirahat', 'ekg_latihan', 'ekg_pemulihan', 'tingkat_kesegaran_jasmani', 'kelas_fungsional', 'kapasitas_aerobik', 'respon_hemodinamik', 'respon_iskemik', 'anjuran', 'riwayat', 'kesan', 'status_pemeriksaan'], 'safe'],
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
        $query = McuSpesialisTreadmill::find();

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
            'id_spesialis_treadmill' => $this->id_spesialis_treadmill,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['ilike', 'permintaan', $this->permintaan])
            ->andFilterWhere(['ilike', 'metode', $this->metode])
            ->andFilterWhere(['ilike', 'lama_latihan', $this->lama_latihan])
            ->andFilterWhere(['ilike', 'test_dihentikan_karena', $this->test_dihentikan_karena])
            ->andFilterWhere(['ilike', 'dj_maksimal', $this->dj_maksimal])
            ->andFilterWhere(['ilike', 'td_maksimal', $this->td_maksimal])
            ->andFilterWhere(['ilike', 'ekg_istirahat', $this->ekg_istirahat])
            ->andFilterWhere(['ilike', 'ekg_latihan', $this->ekg_latihan])
            ->andFilterWhere(['ilike', 'ekg_pemulihan', $this->ekg_pemulihan])
            ->andFilterWhere(['ilike', 'tingkat_kesegaran_jasmani', $this->tingkat_kesegaran_jasmani])
            ->andFilterWhere(['ilike', 'kelas_fungsional', $this->kelas_fungsional])
            ->andFilterWhere(['ilike', 'kapasitas_aerobik', $this->kapasitas_aerobik])
            ->andFilterWhere(['ilike', 'respon_hemodinamik', $this->respon_hemodinamik])
            ->andFilterWhere(['ilike', 'respon_iskemik', $this->respon_iskemik])
            ->andFilterWhere(['ilike', 'anjuran', $this->anjuran])
            ->andFilterWhere(['ilike', 'riwayat', $this->riwayat])
            ->andFilterWhere(['ilike', 'kesan', $this->kesan])
            ->andFilterWhere(['ilike', 'status_pemeriksaan', $this->status_pemeriksaan]);

        return $dataProvider;
    }
}
