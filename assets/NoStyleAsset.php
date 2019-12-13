<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 12/12/2019
 * Time: 19:46
 */

namespace app\assets;


use yii\web\AssetBundle;

class NoStyleAsset extends AssetBundle
{
    public function init()
    {
        $this->js = [];
        $this->css = [];
        $this->depends = [
        ];
    }

}