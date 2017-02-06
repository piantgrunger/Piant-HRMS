<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seksi;

/**
 * SeksiSearch represents the model behind the search form of `app\models\Seksi`.
 */
class SeksiSearch extends Seksi
{
    /**
     * @inheritdoc
     */
      public $kode_Divisi;
    public $nama_Divisi;

        public $kode_Departemen;
    public $nama_Departemen;
    
    public function rules()
    {
        return [
            [['id_seksi', 'id_departemen'], 'integer'],
            [['kode_Divisi','nama_Divisi','kode_Departemen', 'nama_Departemen','kode_seksi', 'nama_seksi', 'ket', 'created_at', 'updated_at'], 'safe'],
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
        $query = Seksi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

            $dataProvider->setSort([
        'attributes' => [
            
                
            'kode_Divisi',
            'nama_Divisi',
            
            'kode_Departemen',
            'nama_Departemen',
            'kode_seksi',
            'nama_seksi',
            'ket',
            
            
       
        ]
    ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
               $query->joinWith('departemen');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
                'id_departemen' => $this->id_departemen,
            'id_seksi' => $this->id_seksi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

  
    

          $query->joinWith('departemen');
          $query->joinWith('divisi');
    

    
          $query->andFilterWhere(['like', 'kode_seksi', $this->kode_seksi])
            ->andFilterWhere(['like', 'nama_seksi', $this->nama_seksi])
            ->andFilterWhere(['like', 'ket', $this->ket])
              ->andFilterWhere(['like', 'kode_departemen', $this->kode_Departemen])
            ->andFilterWhere(['like', 'nama_departemen', $this->nama_Departemen]);
            
        

    
        return $dataProvider;
    }
}
