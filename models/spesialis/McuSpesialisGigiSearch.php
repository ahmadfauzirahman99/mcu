<?php

namespace app\models\spesialis;

use app\models\DataLayanan;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuSpesialisGigi;

/**
 * McuSpesialisGigiSearch represents the model behind the search form of `app\models\spesialis\McuSpesialisGigi`.
 */
class McuSpesialisGigiSearch extends McuSpesialisGigi
{
    public $nama_no_rm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_gigi', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'g18', 'g17', 'g16', 'g15', 'g14', 'g13', 'g12', 'g11', 'g21', 'g22', 'g23', 'g24', 'g25', 'g26', 'g27', 'g28', 'g38', 'g37', 'g36', 'g35', 'g34', 'g33', 'g32', 'g31', 'g41', 'g42', 'g43', 'g44', 'g45', 'g46', 'g47', 'g48', 'oklusi', 'torus_palatinus', 'torus_mandibularis', 'palatum', 'supernumerary_teeth', 'diastema', 'spacing', 'oral_hygiene', 'gingiva_periodontal', 'oral_mucosa', 'tongue', 'lain_lain', 'kesimpulan', 'saran', 'riwayat'], 'safe'],
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
        $query = McuSpesialisGigi::find()->joinWith('pasien');

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
            'id_spesialis_gigi' => $this->id_spesialis_gigi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'g18', $this->g18])
            ->andFilterWhere(['ilike', 'g17', $this->g17])
            ->andFilterWhere(['ilike', 'g16', $this->g16])
            ->andFilterWhere(['ilike', 'g15', $this->g15])
            ->andFilterWhere(['ilike', 'g14', $this->g14])
            ->andFilterWhere(['ilike', 'g13', $this->g13])
            ->andFilterWhere(['ilike', 'g12', $this->g12])
            ->andFilterWhere(['ilike', 'g11', $this->g11])
            ->andFilterWhere(['ilike', 'g21', $this->g21])
            ->andFilterWhere(['ilike', 'g22', $this->g22])
            ->andFilterWhere(['ilike', 'g23', $this->g23])
            ->andFilterWhere(['ilike', 'g24', $this->g24])
            ->andFilterWhere(['ilike', 'g25', $this->g25])
            ->andFilterWhere(['ilike', 'g26', $this->g26])
            ->andFilterWhere(['ilike', 'g27', $this->g27])
            ->andFilterWhere(['ilike', 'g28', $this->g28])
            ->andFilterWhere(['ilike', 'g38', $this->g38])
            ->andFilterWhere(['ilike', 'g37', $this->g37])
            ->andFilterWhere(['ilike', 'g36', $this->g36])
            ->andFilterWhere(['ilike', 'g35', $this->g35])
            ->andFilterWhere(['ilike', 'g34', $this->g34])
            ->andFilterWhere(['ilike', 'g33', $this->g33])
            ->andFilterWhere(['ilike', 'g32', $this->g32])
            ->andFilterWhere(['ilike', 'g31', $this->g31])
            ->andFilterWhere(['ilike', 'g41', $this->g41])
            ->andFilterWhere(['ilike', 'g42', $this->g42])
            ->andFilterWhere(['ilike', 'g43', $this->g43])
            ->andFilterWhere(['ilike', 'g44', $this->g44])
            ->andFilterWhere(['ilike', 'g45', $this->g45])
            ->andFilterWhere(['ilike', 'g46', $this->g46])
            ->andFilterWhere(['ilike', 'g47', $this->g47])
            ->andFilterWhere(['ilike', 'g48', $this->g48])
            ->andFilterWhere(['ilike', 'oklusi', $this->oklusi])
            ->andFilterWhere(['ilike', 'torus_palatinus', $this->torus_palatinus])
            ->andFilterWhere(['ilike', 'torus_mandibularis', $this->torus_mandibularis])
            ->andFilterWhere(['ilike', 'palatum', $this->palatum])
            ->andFilterWhere(['ilike', 'supernumerary_teeth', $this->supernumerary_teeth])
            ->andFilterWhere(['ilike', 'diastema', $this->diastema])
            ->andFilterWhere(['ilike', 'spacing', $this->spacing])
            ->andFilterWhere(['ilike', 'oral_hygiene', $this->oral_hygiene])
            ->andFilterWhere(['ilike', 'gingiva_periodontal', $this->gingiva_periodontal])
            ->andFilterWhere(['ilike', 'oral_mucosa', $this->oral_mucosa])
            ->andFilterWhere(['ilike', 'tongue', $this->tongue])
            ->andFilterWhere(['ilike', 'lain_lain', $this->lain_lain])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere(['ilike', 'saran', $this->saran])
            ->andFilterWhere(['ilike', 'riwayat', $this->riwayat])
            ->andFilterWhere([
                'or',
                ['ilike', DataLayanan::tableName() . '.no_rekam_medik', $this->nama_no_rm],
                ['ilike', DataLayanan::tableName() . '.nama', $this->nama_no_rm]
            ]);

        return $dataProvider;
    }
}
