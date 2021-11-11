<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\widgets\datepicker;

use Yii;
use yii\web\AssetBundle;


class DatePickerLanguageAsset extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = (__DIR__ . '/assets/jquery-ui');
    /**
     * @var boolean whether to automatically generate the needed language js files.
     * If this is true, the language js files will be determined based on the actual usage of [[DatePicker]]
     * and its language settings. If this is false, you should explicitly specify the language js files via [[js]].
     */
    public $autoGenerate = true;
    /**
     * @var string language to register translation file for
     */
    public $language;
    /**
     * {@inheritdoc}
     */
    public $depends = [
        'common\widgets\datepicker\JuiAsset',
    ];


    /**
     * {@inheritdoc}
     */
    public function registerAssetFiles($view)
    {
        if ($this->autoGenerate) {
            $language = $this->language;
            $fallbackLanguage = substr($this->language, 0, 2);
            if ($fallbackLanguage !== $this->language && !file_exists(Yii::getAlias($this->sourcePath . "/ui/i18n/datepicker-{$language}.js"))) {
                $language = $fallbackLanguage;
            }
            $this->js[] = "i18n/datepicker-$language.js";
        }
        parent::registerAssetFiles($view);
    }
}