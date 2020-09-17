<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\McuSettingManualLab;

/**
 * SettingManualLabSearch represents the model behind the search form of `app\models\McuSettingManualLab`.
 */
class SettingManualLabSearch extends McuSettingManualLab
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_manual', 'no_pasien', 'no_registrasi', 'kondisi', 'nilai_manual', 'status'], 'safe'],
            [['id_item_lab'], 'integer'],
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
        $query = McuSettingManualLab::find();

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
        ]);

        $query->andFilterWhere(['ilike', 'id_manual', $this->id_manual])
            ->andFilterWhere(['ilike', 'no_pasien', $this->no_pasien])
            ->andFilterWhere(['ilike', 'no_registrasi', $this->no_registrasi])
            ->andFilterWhere(['ilike', 'kondisi', $this->kondisi])
            ->andFilterWhere(['ilike', 'nilai_manual', $this->nilai_manual])
            ->andFilterWhere(['ilike', 'status', $this->status]);

        return $dataProvider;
    }
}
