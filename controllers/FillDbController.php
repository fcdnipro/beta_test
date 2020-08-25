<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Currency;
use yii\widgets\InputWidget;

class FillDbController extends Controller
{
    public function actionFillDb()
    {
        return 'ok';
    }
    public function fillByUrl()
    {
        $sDate = $_POST['#idRange'];
        $eDate = $_POST['#idRange-2'];
        $url=yii::$app->params['apiUrl']+yii::$app->params['apiDaily']+yii::$app->params['apiParam'];
        $xml = simplexml_load_file($url);
        $xml = json_decode(json_encode($xml), TRUE);
        $values = $xml['Valute'];

        $date = $xml['@attributes']['Date'];
        $tmp = explode('.', $date);
        $date = $tmp[2] . '-' . $tmp[1] . '-' . $tmp[0];

        for ($i = 0;$i < )
        if ($date == $sDate)

        foreach ($values as $k => $v) {
            $cur = new Currency();

            $cur->valuteID = $v['@attributes']['ID'];
            $cur->name = $v['Name'];
            $cur->numCode = $v['NumCode'];
            $cur->value = floatval($v['Value']);
            $cur->сharCode = $v['CharCode'];
            $cur->date = $date;
            $cur->save();
        }
    }
}
