<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */

    public $authorEmail;
    public function rules()
    {
        return [
            [['id',
                'finished_at',
                'author_id',
                'main',
                'cycle',
                'created_at',
                'updated_at'],
                'integer'],
            [['title'], 'safe'],
            [['authorEmail'], 'string'],
            [['started_at'], 'date', 'format' => 'php:d.m.Y'],
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
         $query = Activity::find()->joinWith('users');

        if (!\Yii::$app->user->isGuest) {
            $query->andWhere(['user.id' => \Yii::$app->user->identity->id]);
        } else {
//            $query->where('0=1');
        }

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

        if (!empty($this->started_at)) {
            $this->filterByDate('started_at', $query);
        }

        if (!empty($this->finished_at)) {
            $this->filterByDate('finished_at', $query);
        }

        if (!empty($this->authorEmail)) {
            $query->joinWith('author as author');
            $query->andWhere(['like', 'author.email', $this->authorEmail]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'finished_at' => $this->finished_at,
            'main' => $this->main,
            'cycle' => $this->cycle,
            'updated_at' => $this->updated_at,
        ]);


        if (empty($this->title) && $this->title === '0'){

        }
        return $dataProvider;
    }

    private function filterByDate($attr, $query)
    {
        $dayStart = (int)\Yii::$app->formatter->asTimestamp($this->$attr . ' 00:00:00');
        $dayStop = (int)\Yii::$app->formatter->asTimestamp($this->$attr . ' 23:59:59');
        $query->andFilterWhere([
            'between',
            self::tableName() . ".$attr",
            $dayStart,
            $dayStop,
        ]);
    }
}
