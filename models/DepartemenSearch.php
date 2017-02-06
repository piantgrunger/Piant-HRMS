<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departemen;

/**
 * DepartemenSearch represents the model behind the search form of `app\models\Departemen`.
 */
class DepartemenSearch extends Departemen
{
    /**
     * @inheritdoc
     */
    public $kode_Divisi;
    public $nama_Divisi;
    
    public function rules()
    {
        return [
            [['id_departemen', 'id_divisi'], 'integer'],
            [['kode_Divisi','nama_Divisi','kode_departemen', 'nama_departemen', 'ket', 'created_at', 'updated_at'], 'safe'],
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
        $query = Departemen::find();
        

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        
         $dataProvider->setSort([
        'attributes' => [
            'kode_Divisi',
            'nama_Divisi',
            'kode_departemen',
            'nama_departemen',
            'ket'
            
            
       
        ]
    ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith('divisi');
            return $dataProvider;
        }
        
  

        // grid filtering conditions
        $query->andFilterWhere([
        
            'id_departemen' => $this->id_departemen,
            'id_divisi' => $this->id_divisi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_departemen', $this->kode_departemen])
            ->andFilterWhere(['like', 'nama_departemen', $this->nama_departemen])
            ->andFilterWhere(['like', 'ket', $this->ket]);
        
          // filter by country name
    $query->joinWith(['divisi' => function ($q) {
        $q->where('tb_m_divisi.kode_divisi LIKE "%' . $this->kode_Divisi . '%"');
    }]);
    
 $query->joinWith(['divisi' => function ($q) {
        $q->where('tb_m_divisi.nama_divisi LIKE "%' . $this->nama_Divisi . '%"');
    }]);

        return $dataProvider;
    }
}
