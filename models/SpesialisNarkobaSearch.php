<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpesialisNarkoba;

/**
 * SpesialisNarkobaSearch represents the model behind the search form of `app\models\SpesialisNarkoba`.
 */
class SpesialisNarkobaSearch extends SpesialisNarkoba
{
    public $nama_no_rm;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_narkoba', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'golongan_psikotropika', 'hasil_psikotropika', 'golongan_narkotika', 'hasil_narkotika'], 'safe'],
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
        $query = SpesialisNarkoba::find()->joinWith('pasien');

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
            'id_spesialis_narkoba' => $this->id_spesialis_narkoba,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'golongan_psikotropika', $this->golongan_psikotropika])
            ->andFilterWhere(['ilike', 'hasil_psikotropika', $this->hasil_psikotropika])
            ->andFilterWhere(['ilike', 'golongan_narkotika', $this->golongan_narkotika])
            ->andFilterWhere(['ilike', 'hasil_narkotika', $this->hasil_narkotika])
            ->andFilterWhere([
                'or',
                ['ilike', DataLayanan::tableName() . '.no_rekam_medik', $this->nama_no_rm],
                ['ilike', DataLayanan::tableName() . '.nama', $this->nama_no_rm]
            ]);

        return $dataProvider;
    }
}
