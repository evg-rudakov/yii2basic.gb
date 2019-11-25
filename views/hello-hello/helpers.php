<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 25/11/2019
 * Time: 19:47
 */

use yii\helpers\Html;

$name = 'NameName';
?>
<?php
$isError = true;
$slim = true;
if ($isError) {
    $class = 'btn btn-warning';
} else {
    $class = 'btn btn-success';
}

if ($slim){
    $style = 'width:1000px';
} else {
    $style = 'width:100px';

}
$span = Html::tag('span', Html::encode($name), ['class' => $class, 'onClick'=>'alert("vsem priver");'] );

echo $span;
?>

<?php if ($isError) { ?>
    <span class="btn btn-warning" style=""><?=$name?></span>
<?php } else { ?>
    <span class="btn btn-success"><?=$name?></span>
<?php } ?>

<?=Html::button('textknopki', ['class'=>'btn'])?>
<?=Html::a('Текст ссылки', \yii\helpers\Url::to(['site/about']), ['class'=>'btn btn-error'])?>

