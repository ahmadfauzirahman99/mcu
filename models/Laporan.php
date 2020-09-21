<?php
/**
 * Created by PhpStorm.
 * User: Salman
 * Date: 22/02/2018
 * Time: 11.28
 */

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

set_time_limit(0);

class Laporan extends Model
{
    // public function getPerkembanganPegawai()
    // {    
    //     $data = \Yii::$app->db->createCommand("
    //         SELECT a.*, b.pemberhentian_tertanggal, c.catatan, 
    //         (select d.id from ".RiwayatKepangkatan::tableName()." d where d.nip=a.id_nip_nrp order by d.sk_tanggal_pangkat desc limit 1) as pangkat,
    //         (select e.id from ".RiwayatJabatan::tableName()." e where e.nip=a.id_nip_nrp order by e.sk_pelantikan_tanggal desc limit 1) as jabatan,
    //         (select f.id from ".RiwayatPendidikan::tableName()." f where f.nip=a.id_nip_nrp order by f.tanggal_sttb desc limit 1) as pendidikan
    //         FROM ".Pegawai::tableName()." a
    //         LEFT JOIN ".MutasiPemberhentian::tableName()." b ON b.nip = a.id_nip_nrp
    //         LEFT JOIN ".CatatanMutasiJabatan::tableName()." c ON c.nip = a.id_nip_nrp
    //         WHERE a.status_kepegawaian_id ='121' OR a.status_kepegawaian_id ='122'
    //         ORDER BY b.pemberhentian_tertanggal DESC")->queryAll();
        
    //     return $data;
    // }
    
}