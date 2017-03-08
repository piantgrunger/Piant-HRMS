<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;


/**
 * This is the model class for table "tb_m_karyawan".
 *
 * @property int $id_karyawan
 * @property string $kode_karyawan
 * @property string $nama_karyawan
 * @property string $foto_karyawan
 * @property string $alamat_karyawan
 * @property string $telp_karyawan
 * @property string $no_id
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $stat_nikah
 * @property string $agama
 * @property string $tgl_masuk
 * @property string $tgl_efektif
 * @property string $tgl_keluar
 * @property string $stat_karyawan
 * @property string $stat_kerja
 * @property string $stat_wna
 * @property int $id_divisi
 * @property int $id_departemen
 * @property int $id_seksi
 * @property int $id_jabatan
 * @property string $stat_serikat_pegawai
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMDepartemen $departemen
 * @property TbMDivisi $divisi
 * @property TbMJabatan $jabatan
 * @property TbMSeksi $seksi
 */
class karyawan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'tb_m_karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_karyawan', 'nama_karyawan', 'tgl_lahir', 'stat_nikah', 'agama', 'tgl_masuk', 'tgl_efektif', 'stat_karyawan', 'stat_kerja', 'stat_wna', 'id_divisi', 'id_departemen', 'id_jabatan', 'stat_serikat_pegawai'], 'required'],
            [['alamat_karyawan', 'stat_nikah', 'agama', 'stat_karyawan', 'stat_kerja', 'stat_wna', 'stat_serikat_pegawai', 'ket'], 'string'],
            [['tgl_lahir','foto_karyawan' ,'tgl_masuk', 'tgl_efektif', 'tgl_keluar', 'created_at', 'updated_at'], 'safe'],
            [['id_divisi', 'id_departemen', 'id_seksi', 'id_jabatan'], 'integer'],
            [['kode_karyawan', 'nama_karyawan', 'telp_karyawan', 'no_id', 'tempat_lahir'], 'string', 'max' => 50],
             [['foto_karyawan'],'file','extensions'=>'jpg, jpeg, png', 'maxSize'=>1024 * 1024 * 1],
            [['kode_karyawan'], 'unique'],
            [['id_departemen'], 'exist', 'skipOnError' => true, 'targetClass' => Departemen::className(), 'targetAttribute' => ['id_departemen' => 'id_departemen']],
            [['id_divisi'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['id_divisi' => 'id_divisi']],
            [['id_jabatan'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['id_jabatan' => 'id_jabatan']],
            [['id_seksi'], 'exist', 'skipOnError' => true, 'targetClass' => Seksi::className(), 'targetAttribute' => ['id_seksi' => 'id_seksi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karyawan' => Yii::t('app', 'Id Karyawan'),
            'kode_karyawan' => Yii::t('app', 'Kode Karyawan'),
            'nama_karyawan' => Yii::t('app', 'Nama Karyawan'),
            'foto_karyawan' => Yii::t('app', 'Foto Karyawan'),
            'alamat_karyawan' => Yii::t('app', 'Alamat Karyawan'),
            'telp_karyawan' => Yii::t('app', 'Telp Karyawan'),
            'no_id' => Yii::t('app', 'No ID'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tgl_lahir' => Yii::t('app', 'Tgl Lahir'),
            'stat_nikah' => Yii::t('app', 'Stat Nikah'),
            'agama' => Yii::t('app', 'Agama'),
            'tgl_masuk' => Yii::t('app', 'Tgl Masuk'),
            'tgl_efektif' => Yii::t('app', 'Tgl Efektif'),
            'tgl_keluar' => Yii::t('app', 'Tgl Keluar'),
            'stat_karyawan' => Yii::t('app', 'Stat Karyawan'),
            'stat_kerja' => Yii::t('app', 'Stat Kerja'),
            'stat_wna' => Yii::t('app', 'Stat Wna'),
            'id_divisi' => Yii::t('app', 'Id Divisi'),
            'id_departemen' => Yii::t('app', 'Id Departemen'),
            'id_seksi' => Yii::t('app', 'Id Seksi'),
            'id_jabatan' => Yii::t('app', 'Id Jabatan'),
            'stat_serikat_pegawai' => Yii::t('app', 'Stat Serikat Pegawai'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
   
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartemen()
    {
        return $this->hasOne(TbMDepartemen::className(), ['id_departemen' => 'id_departemen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisi()
    {
        return $this->hasOne(TbMDivisi::className(), ['id_divisi' => 'id_divisi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(TbMJabatan::className(), ['id_jabatan' => 'id_jabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeksi()
    {
        return $this->hasOne(TbMSeksi::className(), ['id_seksi' => 'id_seksi']);
    }
}
