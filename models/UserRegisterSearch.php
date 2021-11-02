<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserRegister;

/**
 * UserRegisterSearch represents the model behind the search form of `app\models\UserRegister`.
 */
class UserRegisterSearch extends UserRegister
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_id', 'u_no_mcu', 'u_level', 'u_agama', 'u_jadwal_id', 'u_jadwal_asli_id', 'u_istri_ke', 'u_upj_id', 'u_jenis_mcu_id', 'u_instansi_id', 'u_paket_id', 'u_approve_by'], 'integer'],
            [['u_nik', 'u_rm', 'u_no_peserta', 'u_nama_depan', 'u_nama_belakang', 'u_nama_petugas', 'u_email', 'u_alamat', 'u_kab', 'u_provinsi', 'u_jkel', 'u_tgl_lahir', 'u_tmpt_lahir', 'u_no_hp', 'u_status', 'u_auth_key', 'u_last_login', 'u_updated_at', 'u_created_at', 'u_kedudukan_keluarga', 'u_status_nikah', 'u_pekerjaan', 'u_pekerjaan_nama', 'u_jabatan_pekerjaan', 'u_pendidikan', 'u_nama_ayah', 'u_nama_ibu', 'u_nama_pasangan', 'u_anggota_darurat', 'u_anggota_darurat_ket', 'u_tgl_terakhir_mcu', 'u_dokter', 'u_alamat_dokter', 'u_jabatan', 'u_formasi', 'u_tempat_tugas', 'u_biodata_finish_at', 'u_berkas_finish_at', 'u_kuisioner1_finish_at', 'u_kuisioner2_finish_at', 'u_finish_at', 'u_debitur_id', 'u_disclaimer_at', 'u_read_doc_at', 'u_password', 'u_finish_mcu_at', 'u_no_registrasi', 'u_data_pelayanan_id', 'u_kuisioner3_finish_at', 'u_tgl_periksa', 'u_alamat_pekerjaan', 'u_approve_ket', 'u_approve_at', 'u_is_pasien_baru', 'u_ktp', 'u_approve_status'], 'safe'],
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
        $query = UserRegister::find();

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
            'u_id' => $this->u_id,
            'u_no_mcu' => $this->u_no_mcu,
            'u_tgl_lahir' => $this->u_tgl_lahir,
            'u_level' => $this->u_level,
            'u_last_login' => $this->u_last_login,
            'u_updated_at' => $this->u_updated_at,
            'u_created_at' => $this->u_created_at,
            'u_agama' => $this->u_agama,
            'u_tgl_terakhir_mcu' => $this->u_tgl_terakhir_mcu,
            'u_jadwal_id' => $this->u_jadwal_id,
            'u_biodata_finish_at' => $this->u_biodata_finish_at,
            'u_berkas_finish_at' => $this->u_berkas_finish_at,
            'u_kuisioner1_finish_at' => $this->u_kuisioner1_finish_at,
            'u_kuisioner2_finish_at' => $this->u_kuisioner2_finish_at,
            'u_finish_at' => $this->u_finish_at,
            'u_jadwal_asli_id' => $this->u_jadwal_asli_id,
            'u_disclaimer_at' => $this->u_disclaimer_at,
            'u_read_doc_at' => $this->u_read_doc_at,
            'u_istri_ke' => $this->u_istri_ke,
            'u_upj_id' => $this->u_upj_id,
            'u_finish_mcu_at' => $this->u_finish_mcu_at,
            'u_kuisioner3_finish_at' => $this->u_kuisioner3_finish_at,
            'u_jenis_mcu_id' => $this->u_jenis_mcu_id,
            'u_tgl_periksa' => $this->u_tgl_periksa,
            'u_instansi_id' => $this->u_instansi_id,
            'u_paket_id' => $this->u_paket_id,
            'u_approve_by' => $this->u_approve_by,
            'u_approve_at' => $this->u_approve_at,
        ]);

        $query->andFilterWhere(['like', 'u_nik', $this->u_nik])
            ->andFilterWhere(['like', 'u_rm', $this->u_rm])
            ->andFilterWhere(['like', 'u_no_peserta', $this->u_no_peserta])
            ->andFilterWhere(['like', 'u_nama_depan', $this->u_nama_depan])
            ->andFilterWhere(['like', 'u_nama_belakang', $this->u_nama_belakang])
            ->andFilterWhere(['like', 'u_nama_petugas', $this->u_nama_petugas])
            ->andFilterWhere(['like', 'u_email', $this->u_email])
            ->andFilterWhere(['like', 'u_alamat', $this->u_alamat])
            ->andFilterWhere(['like', 'u_kab', $this->u_kab])
            ->andFilterWhere(['like', 'u_provinsi', $this->u_provinsi])
            ->andFilterWhere(['like', 'u_jkel', $this->u_jkel])
            ->andFilterWhere(['like', 'u_tmpt_lahir', $this->u_tmpt_lahir])
            ->andFilterWhere(['like', 'u_no_hp', $this->u_no_hp])
            ->andFilterWhere(['like', 'u_status', $this->u_status])
            ->andFilterWhere(['like', 'u_auth_key', $this->u_auth_key])
            ->andFilterWhere(['like', 'u_kedudukan_keluarga', $this->u_kedudukan_keluarga])
            ->andFilterWhere(['like', 'u_status_nikah', $this->u_status_nikah])
            ->andFilterWhere(['like', 'u_pekerjaan', $this->u_pekerjaan])
            ->andFilterWhere(['like', 'u_pekerjaan_nama', $this->u_pekerjaan_nama])
            ->andFilterWhere(['like', 'u_jabatan_pekerjaan', $this->u_jabatan_pekerjaan])
            ->andFilterWhere(['like', 'u_pendidikan', $this->u_pendidikan])
            ->andFilterWhere(['like', 'u_nama_ayah', $this->u_nama_ayah])
            ->andFilterWhere(['like', 'u_nama_ibu', $this->u_nama_ibu])
            ->andFilterWhere(['like', 'u_nama_pasangan', $this->u_nama_pasangan])
            ->andFilterWhere(['like', 'u_anggota_darurat', $this->u_anggota_darurat])
            ->andFilterWhere(['like', 'u_anggota_darurat_ket', $this->u_anggota_darurat_ket])
            ->andFilterWhere(['like', 'u_dokter', $this->u_dokter])
            ->andFilterWhere(['like', 'u_alamat_dokter', $this->u_alamat_dokter])
            ->andFilterWhere(['like', 'u_jabatan', $this->u_jabatan])
            ->andFilterWhere(['like', 'u_formasi', $this->u_formasi])
            ->andFilterWhere(['like', 'u_tempat_tugas', $this->u_tempat_tugas])
            ->andFilterWhere(['like', 'u_debitur_id', $this->u_debitur_id])
            ->andFilterWhere(['like', 'u_password', $this->u_password])
            ->andFilterWhere(['like', 'u_no_registrasi', $this->u_no_registrasi])
            ->andFilterWhere(['like', 'u_data_pelayanan_id', $this->u_data_pelayanan_id])
            ->andFilterWhere(['like', 'u_alamat_pekerjaan', $this->u_alamat_pekerjaan])
            ->andFilterWhere(['like', 'u_approve_ket', $this->u_approve_ket])
            ->andFilterWhere(['like', 'u_is_pasien_baru', $this->u_is_pasien_baru])
            ->andFilterWhere(['like', 'u_ktp', $this->u_ktp])
            ->andFilterWhere(['like', 'u_approve_status', $this->u_approve_status]);

        return $dataProvider;
    }
}
