<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diklat".
 *
 * @property int $id
 * @property int $idpegawai
 * @property int $idmateri
 * @property string $tempat
 * @property string $tgl_mulai
 * @property string $tgl_akhir
 *
 * @property Materi $materi
 * @property Pegawai $pegawai
 */
class Diklat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diklat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpegawai', 'idmateri', 'tempat', 'tgl_mulai', 'tgl_akhir'], 'required'],
            [['idpegawai', 'idmateri'], 'integer'],
            [['tempat'], 'string'],
            [['tgl_mulai', 'tgl_akhir'], 'safe'],
            [['idmateri'], 'exist', 'skipOnError' => true, 'targetClass' => Materi::className(), 'targetAttribute' => ['idmateri' => 'id']],
            [['idpegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['idpegawai' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idpegawai' => 'Pegawai',
            'idmateri' => 'Materi',
            'tempat' => 'Tempat',
            'tgl_mulai' => 'Tanggal Mulai',
            'tgl_akhir' => 'Tanggal Akhir',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelMateri()
    {
        return $this->hasOne(Materi::className(), ['id' => 'idmateri']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'idpegawai']);
    }
}
