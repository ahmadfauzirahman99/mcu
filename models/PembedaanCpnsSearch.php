<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PembedaanCpns;

/**
 * PembedaanCpnsSearch represents the model behind the search form of `app\models\PembedaanCpns`.
 */
class PembedaanCpnsSearch extends PembedaanCpns
{

    public $nama;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembedaan'], 'integer'],
            [['pilhan_terima_jabatan', 'nama','status', 'no_rekam_medik', 'created_by', 'tanggal','noted'], 'safe'],
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
        $query = PembedaanCpns::find()->joinWith(['data']);

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
            'id_pembedaan' => $this->id_pembedaan,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['ilike', 'pilhan_terima_jabatan', $this->pilhan_terima_jabatan])
            ->andFilterWhere(['ilike', 'nama', $this->nama])
            ->andFilterWhere(['ilike', 'status', $this->status])
            ->andFilterWhere(['ilike', 'pembedaan.no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'noted', $this->noted])
            ->andFilterWhere(['ilike', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
