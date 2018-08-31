<?php

namespace app\modules\inquid\controllers;

use yii\web\Controller;

/**
 * Default controller for the `googleprint` module
 */
class CloudController extends Controller
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAuth()
    {
       echo "test";
        echo $this->client_id;
       exit();
    }
}
