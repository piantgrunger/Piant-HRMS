<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jns_absen;

/**
 * Jns_absenSearch represents the model behind the search form of `app\models\Jns_absen`.
 */
class Jns_absenSearch extends Jns_absen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jns_absen'], 'integer'],
            [['kode_jns_absen', 'nama_jns_absen', 'potong_premi_hadir', 'potong_gaji', 'hadir', 'ket', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Jns_absen::find();

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
            'id_jns_absen' => $this->id_jns_absen,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_jns_absen', $this->kode_jns_absen])
            ->andFilterWhere(['like', 'nama_jns_absen', $this->nama_jns_absen])
            ->andFilterWhere(['like', 'potong_premi_hadir', $this->potong_premi_hadir])
            ->andFilterWhere(['like', 'potong_gaji', $this->potong_gaji])
            ->andFilterWhere(['like', 'hadir', $this->hadir])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
