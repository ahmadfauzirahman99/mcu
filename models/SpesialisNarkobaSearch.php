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
            [['no_rekam_medik', 'created_at', 'updated_at', 'benzodiazepin_hasil', 'benzodiazepin_keterangan', 'thc_hasil', 'thc_keterangan', 'piat_hasil', 'piat_keterangan', 'amphetammin_hasil', 'amphetammin_keterangan', 'kokain_hasil', 'kokain_keterangan', 'methamphetamin_hasil', 'methamphetamin_keterangan', 'carisoprodol_hasil', 'carisoprodol_keterangan'], 'safe'],
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
            ->andFilterWhere(['ilike', 'benzodiazepin_hasil', $this->benzodiazepin_hasil])
            ->andFilterWhere(['ilike', 'benzodiazepin_keterangan', $this->benzodiazepin_keterangan])
            ->andFilterWhere(['ilike', 'thc_hasil', $this->thc_hasil])
            ->andFilterWhere(['ilike', 'thc_keterangan', $this->thc_keterangan])
            ->andFilterWhere(['ilike', 'piat_hasil', $this->piat_hasil])
            ->andFilterWhere(['ilike', 'piat_keterangan', $this->piat_keterangan])
            ->andFilterWhere(['ilike', 'amphetammin_hasil', $this->amphetammin_hasil])
            ->andFilterWhere(['ilike', 'amphetammin_keterangan', $this->amphetammin_keterangan])
            ->andFilterWhere(['ilike', 'kokain_hasil', $this->kokain_hasil])
            ->andFilterWhere(['ilike', 'kokain_keterangan', $this->kokain_keterangan])
            ->andFilterWhere(['ilike', 'methamphetamin_keterangan', $this->methamphetamin_keterangan])
            ->andFilterWhere(['ilike', 'carisoprodol_hasil', $this->carisoprodol_hasil])
            ->andFilterWhere(['ilike', 'carisoprodol_keterangan', $this->carisoprodol_keterangan])
            ->andFilterWhere([
                'or',
                ['ilike', DataLayanan::tableName() . '.no_rekam_medik', $this->nama_no_rm],
                ['ilike', DataLayanan::tableName() . '.nama', $this->nama_no_rm]
            ]);

        return $dataProvider;
    }
}
