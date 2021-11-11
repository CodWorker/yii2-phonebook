<?php

namespace common\widgets\datepicker;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class JuiAsset extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = (__DIR__ . '/assets/jquery-ui');
    /**
     * {@inheritdoc}
     */
    public $js = [
        'jquery-ui.js',
    ];
    /**
     * {@inheritdoc}
     */
    public $css = [
        'jquery-ui.css',
    ];
    /**
     * {@inheritdoc}
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}