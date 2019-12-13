<?php

namespace app\models\search;

use app\models\Activity;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calendar;

/**
 * Calendar represents the model behind the search form of `app\models\Calendar`.
 */
class CalendarSearch extends Calendar
{
    /**
     * {@inheritdoc}
     */


    public $start;
    public $end;

    public function rules()
    {
        return [
            [['id', 'start', 'end'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function afterValidate()
    {
        $this->start = (int)\Yii::$app->formatter->asTimestamp($this->start);
        $this->end = (int)\Yii::$app->formatter->asTimestamp($this->end);
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

        $query = Calendar::find()
            ->joinWith('activity')
            ->andWhere(['calendar.user_id' => \Yii::$app->user->id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, '');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions

        $query->andWhere([
            'or',
            ['between', 'activity.finished_at', $this->start, $this->end],
            ['between', 'activity.started_at', $this->start, $this->end]
        ]);

        return $dataProvider;
    }


    public function searchFromCache($params)
    {
        if (\Yii::$app->cache->exists(implode('-', $params))) {
            return \Yii::$app->cache->get(implode('-', $params));
        } else {
            $result =  $this->search($params);
            \Yii::$app->cache->set(implode('-', $params), $result);
            return $result;
        }
    }
}
