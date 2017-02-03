<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


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
            'id_divisi' => Yii::t('app', 'Id Divisi'),
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
        return $this->hasOne(TbMDivisi::className(), ['id_divisi' => 'id_divisi']);
    }
}