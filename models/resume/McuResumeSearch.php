<?php

namespace app\models\resume;

use app\models\DataLayanan;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\resume\McuResume;

/**
 * McuResumeSearch represents the model behind the search form of `app\models\resume\McuResume`.
 */
class McuResumeSearch extends McuResume
{
    public $nama_no_rm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_resume', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'no_daftar', 'created_at', 'updated_at', 'jenis_pemeriksaan', 'tidak_normal', 'riwayat'], 'safe'],
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
        $query = McuResume::find()->joinWith('pasien');

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
            'id_resume' => $this->id_resume,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['ilike', 'jenis_pemeriksaan', $this->jenis_pemeriksaan])
            ->andFilterWhere(['ilike', 'tidak_normal', $this->tidak_normal])
            ->andFilterWhere(['ilike', 'riwayat', $this->riwayat])
            ->andFilterWhere([
                'or',
                ['ilike', DataLayanan::tableName() . '.no_rekam_medik', $this->nama_no_rm],
                ['ilike', DataLayanan::tableName() . '.nama', $this->nama_no_rm]
            ]);

        return $dataProvider;
    }
}
