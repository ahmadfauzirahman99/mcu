<?php

namespace app\models\spesialis;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\spesialis\McuSpesialisGigiKondisi;

/**
 * McuSpesialisGigiKondisiSearch represents the model behind the search form of `app\models\spesialis\McuSpesialisGigiKondisi`.
 */
class McuSpesialisGigiKondisiSearch extends McuSpesialisGigiKondisi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_spesialis_gigi_kondisi', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'nama', 'riwayat'], 'safe'],
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
        $query = McuSpesialisGigiKondisi::find();

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
            'id_spesialis_gigi_kondisi' => $this->id_spesialis_gigi_kondisi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['ilike', 'nama', $this->nama])
            ->andFilterWhere(['ilike', 'riwayat', $this->riwayat]);

        return $dataProvider;
    }
}
