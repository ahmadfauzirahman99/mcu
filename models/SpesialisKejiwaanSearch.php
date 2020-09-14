<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SpesialisKejiwaan;

/**
 * SpesialisKejiwaanSearch represents the model behind the search form of `app\models\SpesialisKejiwaan`.
 */
class SpesialisKejiwaanSearch extends SpesialisKejiwaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_kejiwaan', 'created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik', 'created_at', 'updated_at', 'rs_pendukung', 'status', 'tanggal_created'], 'safe'],
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
        $query = SpesialisKejiwaan::find();

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
            'id_spesialis_kejiwaan' => $this->id_spesialis_kejiwaan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'tanggal_created' => $this->tanggal_created,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'rs_pendukung', $this->rs_pendukung])
            ->andFilterWhere(['ilike', 'status', $this->status]);

        return $dataProvider;
    }
}
