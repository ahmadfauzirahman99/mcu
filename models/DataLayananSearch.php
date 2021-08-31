<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataLayanan;

/**
 * DataLayananSearch represents the model behind the search form of `app\models\DataLayanan`.
 */
class DataLayananSearch extends DataLayanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_pelayanan', 'no_rekam_medik', 'no_mcu', 'nama', 'tempat', 'tgl_lahir', 'agama', 'kedudukan_dalam_keluarga', 'status_perkawinan', 'pendidikan', 'pekerjaan', 'alamat', 'wni', 'tanggal_pemeriksaan', 'pas_foto_offline', 'kode_debitur', 'no_registrasi', 'jenis_kelamin', 'no_ujian'], 'safe'],
            [['pas_foto_online_valid', 'kode_paket'], 'integer'],
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
        $query = DataLayanan::find();

        $query->where(['<>','kode_debitur','0128'])->orderBy('tanggal_pemeriksaan DESC');
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
            'tgl_lahir' => $this->tgl_lahir,
            'tanggal_pemeriksaan' => $this->tanggal_pemeriksaan,
            'pas_foto_online_valid' => $this->pas_foto_online_valid,
            'kode_paket' => $this->kode_paket,
        ]);

        $query->andFilterWhere(['ilike', 'id_data_pelayanan', $this->id_data_pelayanan])
            ->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'no_mcu', $this->no_mcu])
            ->andFilterWhere(['ilike', 'nama', $this->nama])
            ->andFilterWhere(['ilike', 'tempat', $this->tempat])
            ->andFilterWhere(['ilike', 'agama', $this->agama])
            ->andFilterWhere(['ilike', 'kedudukan_dalam_keluarga', $this->kedudukan_dalam_keluarga])
            ->andFilterWhere(['ilike', 'status_perkawinan', $this->status_perkawinan])
            ->andFilterWhere(['ilike', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['ilike', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['ilike', 'alamat', $this->alamat])
            ->andFilterWhere(['ilike', 'wni', $this->wni])
            ->andFilterWhere(['ilike', 'pas_foto_offline', $this->pas_foto_offline])
            ->andFilterWhere(['ilike', 'kode_debitur', $this->kode_debitur])
            ->andFilterWhere(['ilike', 'no_registrasi', $this->no_registrasi])
            ->andFilterWhere(['ilike', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['ilike', 'no_ujian', $this->no_ujian]);

        return $dataProvider;
    }
}
