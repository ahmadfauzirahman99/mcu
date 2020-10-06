<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KategoriSetting;

/**
 * KategoriSettingSearch represents the model behind the search form of `app\models\KategoriSetting`.
 */
class KategoriSettingSearch extends KategoriSetting
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kategori_setting'], 'integer'],
            [['nama_kategori', 'ket', 'status', 'created_id', 'created_date', 'modified_id', 'modified_date', 'deleted_id', 'deleted_date'], 'safe'],
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
        $query = KategoriSetting::find()->andWhere(['<>','status', '0']);

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
            'id_kategori_setting' => $this->id_kategori_setting,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
            'deleted_date' => $this->deleted_date,
        ]);

        $query->andFilterWhere(['ilike', 'nama_kategori', $this->nama_kategori])
            ->andFilterWhere(['ilike', 'ket', $this->ket])
            ->andFilterWhere(['ilike', 'status', $this->status])
            ->andFilterWhere(['ilike', 'created_id', $this->created_id])
            ->andFilterWhere(['ilike', 'modified_id', $this->modified_id])
            ->andFilterWhere(['ilike', 'deleted_id', $this->deleted_id]);

        return $dataProvider;
    }
}
