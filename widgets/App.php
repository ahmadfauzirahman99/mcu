<?php

namespace app\widgets;

use app\models\Kuisioner;
use app\models\UserKuisioner;
use kartik\date\DatePicker;
use Yii;

class App
{
    static function riwayatPenyakit($data, $tab = 5, $c = false,$userRegister = null)
    {
        $h = "";
        $no = 1;
        foreach ($data as $dt) {
            $child = Kuisioner::find()->where(['k_id_parent' => $dt['k_id']])->asArray()->all();
            $value = UserKuisioner::find()->select('uk_ceklis,uk_keterangan')->where(['u_id' => $userRegister->u_id, 'k_id' => $dt['k_id']])->asArray()->limit(1)->one();
            if ($dt['k_id'] == 9) {
                $h .= "
                    <tr>
                        <td colspan='4'>
                            " . $dt['k_isi_indo'] . "<br><small><i>" . $dt['k_isi_eng'] . "</i></small>
                            <textarea class='form-control' name='riwayat-jelaskan[" . $dt['k_id'] . "]'>" . ($value != NULL ? $value['uk_keterangan'] : NULL) . "</textarea>
                        </td>
                    </tr>
                ";
            } elseif ($dt['k_id'] == 103 || $dt['k_id'] == 104) {
                if ($dt['k_id'] == 103) {
                    $opt = "<option value='1' " . ($value != NULL ? ($value['uk_keterangan'] == 1 ? 'selected' : '') : '') . ">Tidak Sedang Menstruasi</option><option value='2' " . ($value != NULL ? ($value['uk_keterangan'] == 2 ? 'selected' : '') : '') . ">Sedang Menstruasi</option>";
                } else {
                    $opt = "<option value='1' " . ($value != NULL ? ($value['uk_keterangan'] == 1 ? 'selected' : '') : '') . ">Tidak Sedang Hamil</option><option value='2' " . ($value != NULL ? ($value['uk_keterangan'] == 2 ? 'selected' : '') : '') . ">Sedang Hamil</option><option value='3' " . ($value != NULL ? ($value['uk_keterangan'] == 3 ? 'selected' : '') : '') . ">Sedang Nifas</option>";
                }
                $h .= "
                    <tr>
                        <td>" . $no . "</td>
                        <td>" . $dt['k_isi_indo'] . "</td>
                        <td colspan='2'>
                            <select name='riwayat-jelaskan[" . $dt['k_id'] . "]' class='form-control'>" . $opt . "</select>
                        </td>
                    </tr>
                ";
            } elseif (($dt['k_id'] >= 46 && $dt['k_id'] <= 53) || $dt['k_id'] == 57) {
                $date = DatePicker::widget([
                    'name'  => "riwayat-jelaskan[" . $dt['k_id'] . "]",
                    'value'  => $value != NULL ? $value['uk_keterangan'] : NULL,
                    // 'dateFormat' => 'dd-MM-yyyy',
                    'options' => ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => $dt['k_id'] != 57 ? 'Tanggal Pemberian Vaksin' : ''],
                    // 'clientOptions' => [
                    //     'maxDate' => date('d-m-Y'),
                    //     'changeMonth' => true,
                    //     'changeYear' => true,
                    // ]
                ]);
                $h .= "
                    <tr>
                        <td>" . $no . "</td>
                        <td>" . $dt['k_isi_indo'] . "</td>
                        <td colspan='2'>
                            " . $date . "
                        </td>
                    </tr>
                ";
            } else {
                $h .= "<tr>
                        <td>" . ($tab == 5 ? $no : '') . "</td>
                        <td style='padding-left:" . $tab . "px; " . (count($child) > 0 && $c ? "font-weight:bolder;" : "") . "'>" . $dt['k_isi_indo'] . "<br><small><i>" . $dt['k_isi_eng'] . "</i></small></td>
                        <td>" . ($dt['k_tipe'] == 0 ?
                    "<label><input type='radio' name='riwayat-pilihan[" . $dt['k_id'] . "]' value='1' " . ($value != NULL ? ($value['uk_ceklis'] == 1 ? "checked" : "") : "") . "> Iya</label>
                            <label style='color:red;'><input type='radio' name='riwayat-pilihan[" . $dt['k_id'] . "]' value='0' " . ($value != NULL ? ($value['uk_ceklis'] == 0 ? "checked" : "") : "checked") . "> Tidak</label>
                            " : '') . "
                        </td>
                        <td class='penjelasan'>" . ($dt['k_tipe'] == 0 ?
                    "<input type='text' class='form-control' name='riwayat-jelaskan[" . $dt['k_id'] . "]' " . ($value != NULL ? ($value['uk_ceklis'] == 0 ? "disabled" : "") : "disabled") . " value='" . ($value != NULL ? $value['uk_keterangan'] : NULL) . "'>
                            " : '') . "
                        </td>
                    </tr>";
            }
            if (count($child) > 0) {
                $h .= self::riwayatPenyakit($child, $tab += 20, true);
                $tab -= 20;
            }
            $no++;
        }
        return $h;
    }
}
