<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gaji".
 *
 * @property int $id
 * @property int $idpegawai
 * @property double $gapok
 * @property double $tunjab
 * @property double $transport
 * @property double $bpjs
 *
 * @property Pegawai $pegawai
 */
class Gaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpegawai', 'gapok', 'tunjab', 'transport', 'bpjs'], 'required'],
            [['idpegawai'], 'integer'],
            [['gapok', 'tunjab', 'transport', 'bpjs'], 'number'],
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
            'idpegawai' => 'Id Pegawai',
            'gapok' => 'Gaji Pokok',
            'tunjab' => 'Tunjangan Bulanan',
            'transport' => 'Transportasi',
            'bpjs' => 'BPJS',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'idpegawai']);
    }
}
