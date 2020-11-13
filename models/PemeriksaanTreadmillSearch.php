<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PemeriksaanTreadmill;

/**
 * PemeriksaanTreadmillSearch represents the model behind the search form of `app\models\PemeriksaanTreadmill`.
 */
class PemeriksaanTreadmillSearch extends PemeriksaanTreadmill
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tread'], 'integer'],
            [['no_daftar', 'no_rekam_medik', 'hasil_treadmill', 'kesan', 'kesimpulan', 'created_at', 'created_by', 'update_at', 'update_by'], 'safe'],
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
        $query = PemeriksaanTreadmill::find();

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
            'id_tread' => $this->id_tread,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['ilike', 'no_daftar', $this->no_daftar])
            ->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'hasil_treadmill', $this->hasil_treadmill])
            ->andFilterWhere(['ilike', 'kesan', $this->kesan])
            ->andFilterWhere(['ilike', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere(['ilike', 'created_by', $this->created_by])
            ->andFilterWhere(['ilike', 'update_by', $this->update_by]);

        return $dataProvider;
    }
}
