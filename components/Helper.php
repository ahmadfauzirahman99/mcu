<?php

namespace app\components;

use app\models\DataLayanan;
use app\models\PemeriksaanFisik;
use app\models\UserRegister;
use DateTime;
use Yii;

class Helper
{
    static function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public static function radioList($index, $label, $name, $checked, $value, $model)
    {
        $id = str_replace(['[', ']'], '_', $name) . $index;
        return \yii\helpers\Html::radio(
            $name,
            $checked,
            [
                'value' => $value,
                'label' => $label,
                'id' => $id
            ]
        );
    }

    public static function getRumpun()
    {

        if (Yii::$app->user->identity->roles == 'Keperawatan') {
            $type = "sr.kode='3'";
        } else {
            $type = "sr.kode='1'";
        }

        $query = "select
        tp.id_nip_nrp,
        tp.nama_lengkap,
        sr.kode as koderumpun,
        sr.nama as rumpun,
        ssr.kode as kodesubrumpun,
        ssr.nama as subrumpun,
        sj.kode as kodejenis,
        sj.nama as jenis
    from
        pegawai.tb_pegawai tp
        --pegawai.tb_pegawai tp
    inner join pegawai.tb_riwayat_penempatan trp on
        trp.id_nip_nrp = tp.id_nip_nrp
    inner join pegawai.dm_sdm_rumpun sr on
        sr.kode = trp.sdm_rumpun
    inner join pegawai.dm_sdm_sub_rumpun ssr on
        ssr.kode = trp.sdm_sub_rumpun
    inner join pegawai.dm_sdm_jenis sj on
        sj.kode = trp.sdm_jenis
    where
        " . $type . "
        and tp.id_nip_nrp = '" . Yii::$app->user->identity->kodeAkun . "'
        order by trp.tanggal DESC limit 1";

        $data = Yii::$app->db->createCommand($query)->queryOne();

        return $data;
    }

    static function getDataLayanan($p)
    {
        $v = DataLayanan::findOne($p);
        return $v;
    }

    static function getDataPemeriksaanFisik($p)
    {
        $query = "SELECT status_gizi_tinggi_badan, status_gizi_berat_badan FROM ".PemeriksaanFisik::tableName()." WHERE no_rekam_medik='$p'";
        $data = Yii::$app->db->createCommand($query)->queryOne();

        return $data;
    }

    static function getDataRegistrasi($p)
    {
        $query = UserRegister::findOne(['u_rm'=>$p]);


        return $query;
    }

    static function hitung_umur($tanggal_lahir){
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        //return $y." tahun ".$m." bulan ".$d." hari";
        return $y;
    }
}
