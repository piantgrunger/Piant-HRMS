<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_jabatan".
 *
 * @property int $jabatan_id
 * @property int $parent_id
 * @property int $lvl
 * @property string $kode_jabatan
 * @property string $nama_jabatan
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class Jabatan extends \yii\db\ActiveRecord
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
        return 'tb_m_jabatan';
    }
    
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'lvl'], 'integer'],
            [[ 'kode_jabatan', 'nama_jabatan'], 'required'],
            [['ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_jabatan', 'nama_jabatan'], 'string', 'max' => 50],
            [['kode_jabatan'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jabatan_id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent'),

            'kode_jabatan' => Yii::t('app', 'Kode Jabatan'),
            'nama_jabatan' => Yii::t('app', 'Nama Jabatan'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public function beforeDelete() {
     
        if (!Jabatan::findOne(['parent_id'=>$this->id_jabatan]))
        {  
            return parent::beforeDelete();
        }
        else {
             Yii::$app->session->setFlash('error','Jabatan ini Tidak Bisa Dihapus Karena Memiliki Bawahan');
            return FALSE;
            
        
        }
    }
}
