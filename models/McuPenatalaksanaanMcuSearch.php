<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuPenatalaksanaanMcu;

/**
 * McuPenatalaksanaanMcuSearch represents the model behind the search form of `app\models\spesialis\McuPenatalaksanaanMcu`.
 */
class McuPenatalaksanaanMcuSearch extends McuPenatalaksanaanMcu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penata', 'id_fk'], 'integer'],
            [['jenis_permasalahan', 'rencana', 'target_waktu', 'hasil_yang_diharapkan', 'keterangan', 'no_rekam_medik', 'jenis'], 'safe'],
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
        $query = McuPenatalaksanaanMcu::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_penata' => $this->id_penata,
            'id_fk' => $this->id_fk,
        ]);

        $query->andFilterWhere(['ilike', 'jenis_permasalahan', $this->jenis_permasalahan])
            ->andFilterWhere(['ilike', 'rencana', $this->rencana])
            ->andFilterWhere(['ilike', 'target_waktu', $this->target_waktu])
            ->andFilterWhere(['ilike', 'hasil_yang_diharapkan', $this->hasil_yang_diharapkan])
            ->andFilterWhere(['ilike', 'keterangan', $this->keterangan])
            ->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}
