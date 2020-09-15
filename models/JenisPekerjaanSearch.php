<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JenisPekerjaan;

/**
 * JenisPekerjaanSearch represents the model behind the search form of `app\models\JenisPekerjaan`.
 */
class JenisPekerjaanSearch extends JenisPekerjaan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_jenis_pekerjaan'], 'integer'],
            [['jenis_pekerjaan', 'bahan_material', 'tempat_kerja', 'masa_kerja', 'no_rekam_medik', 'tanggal_created'], 'safe'],
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
        $query = JenisPekerjaan::find();

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
            'id_jenis_pekerjaan' => $this->id_jenis_pekerjaan,
            'tanggal_created' => $this->tanggal_created,
        ]);

        $query->andFilterWhere(['ilike', 'jenis_pekerjaan', $this->jenis_pekerjaan])
            ->andFilterWhere(['ilike', 'bahan_material', $this->bahan_material])
            ->andFilterWhere(['ilike', 'tempat_kerja', $this->tempat_kerja])
            ->andFilterWhere(['ilike', 'masa_kerja', $this->masa_kerja])
            ->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik]);

        return $dataProvider;
    }
}
