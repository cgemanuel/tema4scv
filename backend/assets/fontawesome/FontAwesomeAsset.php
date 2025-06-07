<?php

namespace backend\assets;
use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/fontawesome';
    public $css = [
        'css/fontawesome.min.css',
    ];
}