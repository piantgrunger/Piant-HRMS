<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_jns_absen".
 *
 * @property int $id_jns_absen
 * @property string $kode_jns_absen
 * @property string $nama_jns_absen
 * @property string $potong_premi_hadir
 * @property string $potong_gaji
 * @property string $hadir
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class Jns_absen extends \yii\db\ActiveRecord
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
        return 'tb_m_jns_absen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_jns_absen', 'nama_jns_absen'], 'required'],
            [['potong_premi_hadir', 'potong_gaji', 'hadir', 'ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_jns_absen'], 'string', 'max' => 20],
            [['nama_jns_absen'], 'string', 'max' => 50],
            [['kode_jns_absen'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_jns_absen' => Yii::t('app', 'Id Jns Absen'),
            'kode_jns_absen' => Yii::t('app', 'Kode Jns Absen'),
            'nama_jns_absen' => Yii::t('app', 'Nama Jns Absen'),
            'potong_premi_hadir' => Yii::t('app', 'Potong Premi Hadir'),
            'potong_gaji' => Yii::t('app', 'Potong Gaji'),
            'hadir' => Yii::t('app', 'Hadir'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
