<?php

namespace app\models\spesialis;

use app\models\DataLayanan;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuSpesialisAudiometri;

/**
 * McuSpesialisAudiometriSearch represents the model behind the search form of `app\models\spesialis\McuSpesialisAudiometri`.
 */
class McuSpesialisAudiometriSearch extends McuSpesialisAudiometri
{
    public $nama_no_rm;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_audiometri', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'ac_125_kanan', 'ac_250_kanan', 'ac_500_kanan', 'ac_1000_kanan', 'ac_2000_kanan', 'ac_3000_kanan', 'ac_4000_kanan', 'ac_5000_kanan', 'ac_6000_kanan', 'ac_7000_kanan', 'ac_8000_kanan', 'bc_125_kanan', 'bc_250_kanan', 'bc_500_kanan', 'bc_1000_kanan', 'bc_2000_kanan', 'bc_3000_kanan', 'bc_4000_kanan', 'bc_5000_kanan', 'bc_6000_kanan', 'bc_7000_kanan', 'bc_8000_kanan', 'ac_125_kiri', 'ac_250_kiri', 'ac_500_kiri', 'ac_1000_kiri', 'ac_2000_kiri', 'ac_3000_kiri', 'ac_4000_kiri', 'ac_5000_kiri', 'ac_6000_kiri', 'ac_7000_kiri', 'ac_8000_kiri', 'bc_125_kiri', 'bc_250_kiri', 'bc_500_kiri', 'bc_1000_kiri', 'bc_2000_kiri', 'bc_3000_kiri', 'bc_4000_kiri', 'bc_5000_kiri', 'bc_6000_kiri', 'bc_7000_kiri', 'bc_8000_kiri', 'kesimpulan_kanan', 'kesimpulan_kiri', 'kesimpulan', 'rata_kanan_ac', 'rata_kanan_bc', 'rata_kiri_ac', 'rata_kiri_bc', 'gambar'], 'safe'],
            ['nama_no_rm', 'safe'],
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
        $query = McuSpesialisAudiometri::find()->joinWith('pasien');

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
            'id_spesialis_audiometri' => $this->id_spesialis_audiometri,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'ac_125_kanan', $this->ac_125_kanan])
            ->andFilterWhere(['ilike', 'ac_250_kanan', $this->ac_250_kanan])
            ->andFilterWhere(['ilike', 'ac_500_kanan', $this->ac_500_kanan])
            ->andFilterWhere(['ilike', 'ac_1000_kanan', $this->ac_1000_kanan])
            ->andFilterWhere(['ilike', 'ac_2000_kanan', $this->ac_2000_kanan])
            ->andFilterWhere(['ilike', 'ac_3000_kanan', $this->ac_3000_kanan])
            ->andFilterWhere(['ilike', 'ac_4000_kanan', $this->ac_4000_kanan])
            ->andFilterWhere(['ilike', 'ac_5000_kanan', $this->ac_5000_kanan])
            ->andFilterWhere(['ilike', 'ac_6000_kanan', $this->ac_6000_kanan])
            ->andFilterWhere(['ilike', 'ac_7000_kanan', $this->ac_7000_kanan])
            ->andFilterWhere(['ilike', 'ac_8000_kanan', $this->ac_8000_kanan])
            ->andFilterWhere(['ilike', 'bc_125_kanan', $this->bc_125_kanan])
            ->andFilterWhere(['ilike', 'bc_250_kanan', $this->bc_250_kanan])
            ->andFilterWhere(['ilike', 'bc_500_kanan', $this->bc_500_kanan])
            ->andFilterWhere(['ilike', 'bc_1000_kanan', $this->bc_1000_kanan])
            ->andFilterWhere(['ilike', 'bc_2000_kanan', $this->bc_2000_kanan])
            ->andFilterWhere(['ilike', 'bc_3000_kanan', $this->bc_3000_kanan])
            ->andFilterWhere(['ilike', 'bc_4000_kanan', $this->bc_4000_kanan])
            ->andFilterWhere(['ilike', 'bc_5000_kanan', $this->bc_5000_kanan])
            ->andFilterWhere(['ilike', 'bc_6000_kanan', $this->bc_6000_kanan])
            ->andFilterWhere(['ilike', 'bc_7000_kanan', $this->bc_7000_kanan])
            ->andFilterWhere(['ilike', 'bc_8000_kanan', $this->bc_8000_kanan])
            ->andFilterWhere(['ilike', 'ac_125_kiri', $this->ac_125_kiri])
            ->andFilterWhere(['ilike', 'ac_250_kiri', $this->ac_250_kiri])
            ->andFilterWhere(['ilike', 'ac_500_kiri', $this->ac_500_kiri])
            ->andFilterWhere(['ilike', 'ac_1000_kiri', $this->ac_1000_kiri])
            ->andFilterWhere(['ilike', 'ac_2000_kiri', $this->ac_2000_kiri])
            ->andFilterWhere(['ilike', 'ac_3000_kiri', $this->ac_3000_kiri])
            ->andFilterWhere(['ilike', 'ac_4000_kiri', $this->ac_4000_kiri])
            ->andFilterWhere(['ilike', 'ac_5000_kiri', $this->ac_5000_kiri])
            ->andFilterWhere(['ilike', 'ac_6000_kiri', $this->ac_6000_kiri])
            ->andFilterWhere(['ilike', 'ac_7000_kiri', $this->ac_7000_kiri])
            ->andFilterWhere(['ilike', 'ac_8000_kiri', $this->ac_8000_kiri])
            ->andFilterWhere(['ilike', 'bc_125_kiri', $this->bc_125_kiri])
            ->andFilterWhere(['ilike', 'bc_250_kiri', $this->bc_250_kiri])
            ->andFilterWhere(['ilike', 'bc_500_kiri', $this->bc_500_kiri])
            ->andFilterWhere(['ilike', 'bc_1000_kiri', $this->bc_1000_kiri])
            ->andFilterWhere(['ilike', 'bc_2000_kiri', $this->bc_2000_kiri])
            ->andFilterWhere(['ilike', 'bc_3000_kiri', $this->bc_3000_kiri])
            ->andFilterWhere(['ilike', 'bc_4000_kiri', $this->bc_4000_kiri])
            ->andFilterWhere(['ilike', 'bc_5000_kiri', $this->bc_5000_kiri])
            ->andFilterWhere(['ilike', 'bc_6000_kiri', $this->bc_6000_kiri])
            ->andFilterWhere(['ilike', 'bc_7000_kiri', $this->bc_7000_kiri])
            ->andFilterWhere(['ilike', 'bc_8000_kiri', $this->bc_8000_kiri])
            ->andFilterWhere(['ilike', 'kesimpulan_kanan', $this->kesimpulan_kanan])
            ->andFilterWhere(['ilike', 'kesimpulan_kiri', $this->kesimpulan_kiri])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere(['ilike', 'rata_kanan_ac', $this->rata_kanan_ac])
            ->andFilterWhere(['ilike', 'rata_kanan_bc', $this->rata_kanan_bc])
            ->andFilterWhere(['ilike', 'rata_kiri_ac', $this->rata_kiri_ac])
            ->andFilterWhere(['ilike', 'rata_kiri_bc', $this->rata_kiri_bc])
            ->andFilterWhere(['ilike', 'gambar', $this->gambar])
            ->andFilterWhere([
                'or',
                ['ilike', DataLayanan::tableName() . '.no_rekam_medik', $this->nama_no_rm],
                ['ilike', DataLayanan::tableName() . '.nama', $this->nama_no_rm]
            ]);

        return $dataProvider;
    }
}
