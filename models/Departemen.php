<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use app\models\Divisi;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "tb_m_departemen".
 *
 * @property int $id_departemen
 * @property int $id_divisi
 * @property string $kode_departemen
 * @property string $nama_departemen
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMDivisi $divisi
 */
class Departemen extends \yii\db\ActiveRecord
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
        return 'tb_m_departemen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_divisi', 'kode_departemen', 'nama_departemen'], 'required'],
            [['id_divisi'], 'integer'],
            [['ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_departemen'], 'string', 'max' => 20],
            [['nama_departemen'], 'string', 'max' => 50],
            [['kode_departemen'], 'unique'],
            [['id_divisi'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['id_divisi' => 'id_divisi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_departemen' => Yii::t('app', 'Id Departemen'),
            'id_divisi' => Yii::t('app', 'Divisi'),
            'kode_departemen' => Yii::t('app', 'Kode Departemen'),
            'nama_departemen' => Yii::t('app', 'Nama Departemen'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisi()
    {
        return $this->hasOne(Divisi::className(), ['id_divisi' => 'id_divisi']);
    }
    public function getKode_Divisi()
    {
        return $this->divisi->kode_divisi;
    }

    public function getNama_Divisi()
    {
        return $this->divisi->nama_divisi;
    }

    public function getId_divisi()
    {
        return $this->divisi->id_divisi;
    }
    public function getDataBrowseDepartemen()
    {        
     return ArrayHelper::map(
                     Departemen::find()
                                        ->select([
                                                'id_departemen','ket_departemen' => 'CONCAT(kode_departemen," - ",nama_departemen)','nama_divisi'
                                        ])
                                        ->join('left join','tb_m_divisi',['tb_m_divisi.id_divisi'=>'tb_m_departemen.id_divisi'])   
                                        ->asArray()
                                        ->all(), 'id_departemen', 'ket_departemen','nama_divisi');
    }
}
