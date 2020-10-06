<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemSetting;

/**
 * ItemSettingSearch represents the model behind the search form of `app\models\ItemSetting`.
 */
class ItemSettingSearch extends ItemSetting
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_item_setting', 'id_kategori_setting'], 'integer'],
            [['nama_item_setting', 'kode_tes', 'nilai_normal', 'ket', 'status', 'created_id', 'created_date', 'modified_id', 'modified_date', 'deleted_id', 'deleted_date'], 'safe'],
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
        $query = ItemSetting::find()->andWhere(['<>','status', '0']);

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
            'id_item_setting' => $this->id_item_setting,
            'id_kategori_setting' => $this->id_kategori_setting,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
            'deleted_date' => $this->deleted_date,
        ]);

        $query->andFilterWhere(['ilike', 'nama_item_setting', $this->nama_item_setting])
            ->andFilterWhere(['ilike', 'kode_tes', $this->kode_tes])
            ->andFilterWhere(['ilike', 'nilai_normal', $this->nilai_normal])
            ->andFilterWhere(['ilike', 'ket', $this->ket])
            ->andFilterWhere(['ilike', 'status', $this->status])
            ->andFilterWhere(['ilike', 'created_id', $this->created_id])
            ->andFilterWhere(['ilike', 'modified_id', $this->modified_id])
            ->andFilterWhere(['ilike', 'deleted_id', $this->deleted_id]);

        return $dataProvider;
    }
}
