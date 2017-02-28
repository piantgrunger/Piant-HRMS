<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jabatan;

/**
 * JabatanSearch represents the model behind the search form of `app\models\Jabatan`.
 */
class JabatanSearch extends Jabatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jabatan', 'parent' ], 'integer'],
            [['kode_jabatan', 'nama_jabatan', 'ket', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params,$parent)
    {
        $query = Jabatan::find();

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
            'id_jabatan' => $this->id_jabatan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        
       $query->andFilterWhere([
            'parent' => $parent,
        ]);
        
        $query->andFilterWhere(['like', 'kode_jabatan', $this->kode_jabatan])
            ->andFilterWhere(['like', 'nama_jabatan', $this->nama_jabatan])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
