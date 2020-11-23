<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanEkg;

/**
 * PemeriksaanEkgSearch represents the model behind the search form of `app\models\PemeriksaanEkg`.
 */
class PemeriksaanEkgSearch extends PemeriksaanEkg
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ekg'], 'integer'],
            [['hasil_ekg', 'kesimpulan', 'kesan', 'create_at', 'created_by', 'update_at', 'update_by', 'no_rekam_medik', 'no_daftar'], 'safe'],
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
        $query = PemeriksaanEkg::find();

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
            'id_ekg' => $this->id_ekg,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['ilike', 'hasil_ekg', $this->hasil_ekg])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere(['ilike', 'kesan', $this->kesan])
            ->andFilterWhere(['ilike', 'created_by', $this->created_by])
            ->andFilterWhere(['ilike', 'update_by', $this->update_by])
            ->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'no_daftar', $this->no_daftar]);

        return $dataProvider;
    }
}
