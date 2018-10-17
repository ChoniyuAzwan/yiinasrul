<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gaji;

/**
 * GajiSearch represents the model behind the search form of `app\models\Gaji`.
 */
class GajiSearch extends Gaji
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idpegawai'], 'integer'],
            [['gapok', 'tunjab', 'transport', 'bpjs'], 'number'],
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
        $query = Gaji::find();

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
            'id' => $this->id,
            'idpegawai' => $this->idpegawai,
            'gapok' => $this->gapok,
            'tunjab' => $this->tunjab,
            'transport' => $this->transport,
            'bpjs' => $this->bpjs,
        ]);

        return $dataProvider;
    }
}
