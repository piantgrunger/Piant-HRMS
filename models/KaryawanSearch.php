<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Karyawan;

/**
 * KaryawanSearch represents the model behind the search form of `app\models\Karyawan`.
 */
class KaryawanSearch extends Karyawan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_divisi', 'id_departemen', 'id_seksi', 'id_jabatan'], 'integer'],
            [['kode_karyawan', 'nama_karyawan', 'foto_karyawan', 'alamat_karyawan', 'telp_karyawan', 'no_id', 'tempat_lahir', 'tgl_lahir', 'stat_nikah', 'agama', 'tgl_masuk', 'tgl_efektif', 'tgl_keluar', 'stat_karyawan', 'stat_kerja', 'stat_wna', 'stat_serikat_pegawai', 'ket', 'created_at', 'updated_at'], 'safe'],
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
        $query = Karyawan::find();

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
            'id_karyawan' => $this->id_karyawan,
            'tgl_lahir' => $this->tgl_lahir,
            'tgl_masuk' => $this->tgl_masuk,
            'tgl_efektif' => $this->tgl_efektif,
            'tgl_keluar' => $this->tgl_keluar,
            'id_divisi' => $this->id_divisi,
            'id_departemen' => $this->id_departemen,
            'id_seksi' => $this->id_seksi,
            'id_jabatan' => $this->id_jabatan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_karyawan', $this->kode_karyawan])
            ->andFilterWhere(['like', 'nama_karyawan', $this->nama_karyawan])
            ->andFilterWhere(['like', 'jns_kelamin', $this->jns_kelamin])
            ->andFilterWhere(['like', 'foto_karyawan', $this->foto_karyawan])
            ->andFilterWhere(['like', 'alamat_karyawan', $this->alamat_karyawan])
            ->andFilterWhere(['like', 'telp_karyawan', $this->telp_karyawan])
            ->andFilterWhere(['like', 'no_id', $this->no_id])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'stat_nikah', $this->stat_nikah])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'stat_karyawan', $this->stat_karyawan])
            ->andFilterWhere(['like', 'stat_kerja', $this->stat_kerja])
            ->andFilterWhere(['like', 'stat_wna', $this->stat_wna])
            ->andFilterWhere(['like', 'stat_serikat_pegawai', $this->stat_serikat_pegawai])
            ->andFilterWhere(['like', 'ket', $this->ket]);

        return $dataProvider;
    }
}
