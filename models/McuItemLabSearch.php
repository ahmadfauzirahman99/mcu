<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\McuItemLab;

/**
 * McuItemLabSearch represents the model behind the search form of `app\models\McuItemLab`.
 */
class McuItemLabSearch extends McuItemLab
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_item_lab'], 'integer'],
            [['nama_item_lab', 'kode_tes_lab', 'nilai_normal', 'ket', 'status', 'created_id', 'created_date', 'modified_id', 'modified_date', 'deleted_id', 'deleted_date'], 'safe'],
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
        $query = McuItemLab::find()->andWhere(['<>','status', '0']);

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
            'id_item_lab' => $this->id_item_lab,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
            'deleted_date' => $this->deleted_date,
        ]);

        $query->andFilterWhere(['ilike', 'nama_item_lab', $this->nama_item_lab])
            ->andFilterWhere(['ilike', 'kode_tes_lab', $this->kode_tes_lab])
            ->andFilterWhere(['ilike', 'nilai_normal', $this->nilai_normal])
            ->andFilterWhere(['ilike', 'ket', $this->ket])
            ->andFilterWhere(['ilike', 'status', $this->status])
            ->andFilterWhere(['ilike', 'created_id', $this->created_id])
            ->andFilterWhere(['ilike', 'modified_id', $this->modified_id])
            ->andFilterWhere(['ilike', 'deleted_id', $this->deleted_id]);

        return $dataProvider;
    }
}
