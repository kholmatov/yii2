<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <code>

    <?php

    /* Check Refresh Token */
    Yii::$app->GoogleCloudPrint->checkRefreshTokenSession(Yii::$app->request->getAbsoluteUrl());

    /* Get printers as an array */
   //$printers = Yii::$app->GoogleCloudPrint->getPrinters();

    /* Render a GridView with the printers  */
   //echo Yii::$app->GoogleCloudPrint->renderPrinters();


    /* print html code */
    //Yii::$app->GoogleCloudPrint->sendPrintToPrinterContent("__google__docs", "job3", "<b>boba</b>", "text/html");

    /* If default printer is not sent, system will take the default printer in the configuration file */
    //$result = Yii::$app->GoogleCloudPrint->sendPrintToPrinterContent("", "job3", "<b>boba</b>", "text/html");

    /* Send pdf file to print */
   $result = Yii::$app->GoogleCloudPrint->sendFileToPrinter("", "Simple pdf", Yii::getAlias('@vendor').'/inquid/yii2-inquid-google-print/2simple.pdf', 'application/pdf');

    /* Check if print works */
    if (isset($result['status'])) {
            echo "it works!";
    }
    ?>
    </code>
</div>
