<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_divisi".
 *
 * @property int $id_divisi
 * @property string $kode_divisi
 * @property string $nama_divisi
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class Divisi extends \yii\db\ActiveRecord
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
        return 'tb_m_divisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_divisi', 'nama_divisi'], 'required'],
            [['ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_divisi'], 'string', 'max' => 20],
            [['nama_divisi'], 'string', 'max' => 50],
            [['kode_divisi'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_divisi' => 'Id Divisi',
            'kode_divisi' => 'Kode Divisi',
            'nama_divisi' => 'Nama Divisi',
            'ket' => 'Ket',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
