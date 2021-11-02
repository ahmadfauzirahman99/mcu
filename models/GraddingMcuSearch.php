<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GraddingMcu;

/**
 * GraddingMcuSearch represents the model behind the search form of `app\models\GraddingMcu`.
 */
class GraddingMcuSearch extends GraddingMcu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gradding', 'id_data_pelayanan', 'no_rekam_medik', 'no_registrasi', 'no_mcu', 'kode_debitur', 'hasil', 'status', 'is_reset'], 'safe'],
            [['poin'], 'number'],
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
        $query = GraddingMcu::find();

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
            'poin' => $this->poin,
        ]);

        // grid filtering conditions
        $query->andFilterWhere(['ilike', 'id_gradding', $this->id_gradding])
            ->andFilterWhere(['ilike', 'id_data_pelayanan', $this->id_data_pelayanan])
            ->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'no_registrasi', $this->no_registrasi])
            ->andFilterWhere(['ilike', 'no_mcu', $this->no_mcu])
            ->andFilterWhere(['ilike', 'kode_debitur', $this->kode_debitur])
            ->andFilterWhere(['ilike', 'hasil', $this->hasil])
            ->andFilterWhere(['ilike', 'status', $this->status])
            ->andFilterWhere(['ilike', 'is_reset', $this->is_reset]);

        return $dataProvider;
    }
}
