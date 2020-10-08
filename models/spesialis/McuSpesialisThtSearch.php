<?php

namespace app\models\spesialis;

use app\models\DataLayanan;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuSpesialisTht;

/**
 * McuSpesialisThtSearch represents the model behind the search form of `app\models\spesialis\McuSpesialisTht`.
 */
class McuSpesialisThtSearch extends McuSpesialisTht
{
    public $nama_no_rm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_tht', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'tl_daun_telinga_kanan', 'tl_daun_telinga_kiri', 'tl_liang_telinga_kanan', 'tl_liang_telinga_kiri', 'tl_serumen_telinga_kanan', 'tl_serumen_telinga_kiri', 'tl_membrana_timpani_telinga_kanan', 'tl_membrana_timpani_telinga_kiri', 'tl_test_berbisik_telinga_kanan', 'tl_test_berbisik_telinga_kiri', 'tl_test_garpu_tala_rinne_telinga_kanan', 'tl_test_garpu_tala_rinne_telinga_kiri', 'tl_weber_telinga_kanan', 'tl_weber_telinga_kiri', 'tl_swabach_telinga_kanan', 'tl_swabach_telinga_kiri', 'tl_bing_telinga_kanan', 'tl_bing_telinga_kiri', 'tl_lain_lain', 'hd_meatus_nasi', 'hd_septum_nasi', 'hd_konka_nasal', 'hd_nyeri_ketok_sinus_maksilar', 'hd_penciuman', 'hd_lain_lain', 'tg_pharynx', 'tg_tonsil_kanan', 'tg_tonsil_kiri', 'tg_ukuran_kanan', 'tg_ukuran_kiri', 'tg_palatum', 'tg_lain_lain', 'audiometri', 'kesimpulan', 'riwayat'], 'safe'],
            ['nama_no_rm', 'safe'],
            [
                [
                    'tl_test_berbisik_telinga_kanan_6',
                    'tl_test_berbisik_telinga_kiri_6',
                    'tl_test_berbisik_telinga_kanan_4',
                    'tl_test_berbisik_telinga_kiri_4',
                    'tl_test_berbisik_telinga_kanan_3',
                    'tl_test_berbisik_telinga_kiri_3',
                    'tl_test_berbisik_telinga_kanan_1',
                    'tl_test_berbisik_telinga_kiri_1',
                ], 'safe'
            ],
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
        $query = McuSpesialisTht::find();

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
            'id_spesialis_tht' => $this->id_spesialis_tht,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'tl_daun_telinga_kanan', $this->tl_daun_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_daun_telinga_kiri', $this->tl_daun_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_liang_telinga_kanan', $this->tl_liang_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_liang_telinga_kiri', $this->tl_liang_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_serumen_telinga_kanan', $this->tl_serumen_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_serumen_telinga_kiri', $this->tl_serumen_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_membrana_timpani_telinga_kanan', $this->tl_membrana_timpani_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_membrana_timpani_telinga_kiri', $this->tl_membrana_timpani_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kanan', $this->tl_test_berbisik_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kiri', $this->tl_test_berbisik_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kanan_6', $this->tl_test_berbisik_telinga_kanan_6])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kiri_6', $this->tl_test_berbisik_telinga_kiri_6])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kanan_4', $this->tl_test_berbisik_telinga_kanan_4])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kiri_4', $this->tl_test_berbisik_telinga_kiri_4])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kanan_3', $this->tl_test_berbisik_telinga_kanan_3])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kiri_3', $this->tl_test_berbisik_telinga_kiri_3])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kanan_1', $this->tl_test_berbisik_telinga_kanan_1])
            ->andFilterWhere(['ilike', 'tl_test_berbisik_telinga_kiri_1', $this->tl_test_berbisik_telinga_kiri_1])
            ->andFilterWhere(['ilike', 'tl_test_garpu_tala_rinne_telinga_kanan', $this->tl_test_garpu_tala_rinne_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_test_garpu_tala_rinne_telinga_kiri', $this->tl_test_garpu_tala_rinne_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_weber_telinga_kanan', $this->tl_weber_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_weber_telinga_kiri', $this->tl_weber_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_swabach_telinga_kanan', $this->tl_swabach_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_swabach_telinga_kiri', $this->tl_swabach_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_bing_telinga_kanan', $this->tl_bing_telinga_kanan])
            ->andFilterWhere(['ilike', 'tl_bing_telinga_kiri', $this->tl_bing_telinga_kiri])
            ->andFilterWhere(['ilike', 'tl_lain_lain', $this->tl_lain_lain])
            ->andFilterWhere(['ilike', 'hd_meatus_nasi', $this->hd_meatus_nasi])
            ->andFilterWhere(['ilike', 'hd_septum_nasi', $this->hd_septum_nasi])
            ->andFilterWhere(['ilike', 'hd_konka_nasal', $this->hd_konka_nasal])
            ->andFilterWhere(['ilike', 'hd_nyeri_ketok_sinus_maksilar', $this->hd_nyeri_ketok_sinus_maksilar])
            ->andFilterWhere(['ilike', 'hd_penciuman', $this->hd_penciuman])
            ->andFilterWhere(['ilike', 'hd_lain_lain', $this->hd_lain_lain])
            ->andFilterWhere(['ilike', 'tg_pharynx', $this->tg_pharynx])
            ->andFilterWhere(['ilike', 'tg_tonsil_kanan', $this->tg_tonsil_kanan])
            ->andFilterWhere(['ilike', 'tg_tonsil_kiri', $this->tg_tonsil_kiri])
            ->andFilterWhere(['ilike', 'tg_ukuran_kanan', $this->tg_ukuran_kanan])
            ->andFilterWhere(['ilike', 'tg_ukuran_kiri', $this->tg_ukuran_kiri])
            ->andFilterWhere(['ilike', 'tg_palatum', $this->tg_palatum])
            ->andFilterWhere(['ilike', 'tg_lain_lain', $this->tg_lain_lain])
            ->andFilterWhere(['ilike', 'audiometri', $this->audiometri])
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
