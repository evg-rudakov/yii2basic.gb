<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p></p>
    <p>
        Url::to(['calendar/index']) <?= Url::to(['calendar/index']) ?>                                                </p>
    <p> Url::to(['calendar/view', 'id' => 100]) <?= Url::to([
            'calendar/view',
            'id' => 100
        ]) ?>                                    </p>
    <p> Url::to(['calendar/view', 'id' => 100, '#' => 'jakorb']) <?= Url::to([
            'calendar/view',
            'id' => 100,
            '#' => 'jakorb'
        ]) ?>                   </p>
    <p> Url::to(['calendar/view', 'id' => 100, '#' => 'jakorb'], true) <?= Url::to([
            'calendar/view',
            'id' => 100,
            '#' => 'jakorb'
        ], true) ?>             </p>
    <p> Url::to(['calendar/view', 'id' => 100, '#' => 'jakorb'], 'https') <?= Url::to([
            'calendar/view',
            'id' => 100,
            '#' => 'jakorb'
        ], 'https') ?>          </p>
    <p> Url::to(['admin/user/view', 'id' => 100, '#' => 'jakorb'], 'https') <?= Url::to([
            'admin/user/view',
            'id' => 100,
            '#' => 'jakorb'
        ], 'https') ?>        </p>
    <p> Url::to(['/admin/user/view', 'id' => 100, '#' => 'jakorb'], 'https') <?= Url::to([
            '/admin/user/view',
            'id' => 100,
            '#' => 'jakorb'
        ], 'https') ?>       </p>
    <p> Url::home() <?= Url::home() ?>                                                                </p>
    <p> Url::base() <?= Url::base() ?>                                                                </p>
    <p> Url::canonical() <?= Url::canonical() ?>                                                           </p>


</div>

<a href="/site/index"></a>
<a href="<?=Url::to(['site/index'])?>"></a>

<code><?= __FILE__ ?></code>
</div>
