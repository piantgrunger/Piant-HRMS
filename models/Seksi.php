<?php

namespace app\models;

use Yii;
use app\models\Departemen;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_seksi".
 *
 * @property int $id_seksi
 * @property int $id_departemen
 * @property string $kode_seksi
 * @property string $nama_seksi
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMDepartemen $departemen
 */
class Seksi extends \yii\db\ActiveRecord
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
        return 'tb_m_seksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_departemen', 'kode_seksi', 'nama_seksi'], 'required'],
            [['id_departemen'], 'integer'],
            [['ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_seksi'], 'string', 'max' => 20],
            [['nama_seksi'], 'string', 'max' => 50],
            [['kode_seksi'], 'unique'],
            [['id_departemen'], 'exist', 'skipOnError' => true, 'targetClass' => Departemen::className(), 'targetAttribute' => ['id_departemen' => 'id_departemen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_seksi' => Yii::t('app', 'Id Seksi'),
            'id_departemen' => Yii::t('app', 'Departemen'),
            'kode_seksi' => Yii::t('app', 'Kode Seksi'),
            'nama_seksi' => Yii::t('app', 'Nama Seksi'),
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
        return $this->hasOne(Departemen::className(), ['id_departemen' => 'id_departemen']);
    }
    

      public function getDivisi()
    {
        return $this->hasOne(Divisi::className(), ['id_divisi' => 'id_divisi'])->via('departemen')               ;
    }
  
  
    public function getKode_Departemen()
            
    {
        return $this->departemen->kode_departemen;
    }
    public function getNama_Departemen()
    {
        return $this->departemen->nama_departemen;
    }
    
     public function getKode_Divisi()
    {
        return $this->departemen->kode_Divisi;
    }
    public function getNama_Divisi()
    {
        return $this->departemen->nama_Divisi;
    }
        public function getId_divisi()
    {
        return $this->departemen->id_divisi;
    }
    
    
}
       