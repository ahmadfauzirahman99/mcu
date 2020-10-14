<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SettingGlobal;

/**
 * SettingGlobalSearch represents the model behind the search form of `app\models\SettingGlobal`.
 */
class SettingGlobalSearch extends SettingGlobal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_global', 'id_item_setting'], 'integer'],
            [['tampil', 'status'], 'safe'],
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
        $query = SettingGlobal::find()
         ->with(['item'])->andWhere(['<>','status', '0']);

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
            'id_global' => $this->id_global,
            'id_item_setting' => $this->id_item_setting,
        ]);

        $query->andFilterWhere(['ilike', 'tampil', $this->tampil])
            ->andFilterWhere(['ilike', 'status', $this->status]);

        return $dataProvider;
    }
}
