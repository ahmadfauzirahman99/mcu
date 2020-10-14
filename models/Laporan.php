<?php

/**
 * Created by PhpStorm.
 * User: Salman
 * Date: 22/02/2018
 * Time: 11.28
 */

namespace app\models;

use app\models\GraddingMcu;
use yii\base\Model;
use yii\db\ActiveRecord;

set_time_limit(0);

class Laporan extends Model
{
    public function getdataMCU($laporan)
    {    
    

        $data = \Yii::$app->db->createCommand("
        select
        data_pelayanan.nama as nama_peserta,
        data_pelayanan.no_rekam_medik as no_rekam_medik,
        data_pelayanan.no_ujian as no_ujian,
        date_part('year',age('now',data_pelayanan.tgl_lahir)) as Umur,
        data_pelayanan.jenis_kelamin as jenis_kelamin,
        m_pemeriksaan_fisik.status_gizi_tinggi_badan as tinggi_badan,
        m_pemeriksaan_fisik.status_gizi_berat_badan as berat_badan,
        m_pemeriksaan_fisik.tanda_vital_tekanan_darah as tensi,
        m_pemeriksaan_fisik.id_m_pemeriksaan_fisik as id_m_pemeriksaan_fisik,
        validasi_rekap.score,
        validasi_rekap.ket,
        'kosong'
    from
        mcu.m_pemeriksaan_fisik
    inner join mcu.lampiran_jaksa on
        mcu.lampiran_jaksa.no_mr = m_pemeriksaan_fisik.no_rekam_medik
    inner join mcu.data_pelayanan on
        data_pelayanan.no_rekam_medik = m_pemeriksaan_fisik.no_rekam_medik
    left join mcu.validasi_rekap on
        validasi_rekap.id_m_pemeriksaan_fisik =  cast (m_pemeriksaan_fisik.id_m_pemeriksaan_fisik as varchar)")->queryAll();
        
        return $data;
    }
    
    public function getDataLaporanPaket($KodeDebitur)
    {
        $data = GraddingMcu::find()
        ->andWhere(['kode_debitur'=>$KodeDebitur])
        ->asArray()
        ->all();

        return $data;
    }
}
