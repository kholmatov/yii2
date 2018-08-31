<?php

namespace app\modules\inquid;

/**
 * googleprint module definition class
 */
class googleprint extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\inquid\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        // инициализация модуля с помощью конфигурации, загруженной из config.php
        \Yii::configure($this, require __DIR__ . '/config.php');
    }
}
