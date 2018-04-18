<?php

namespace app\modules\export\controllers;

use app\modules\export\models\Plans;
use app\modules\export\models\PlansProperty;
use yii\web\Controller;
use app\modules\export\models\UploadForm;
use Yii;
use yii\web\UploadedFile;

class ExportController extends Controller
{
    public function actionAddplans() {
        $model = new UploadForm();
        $message = '';

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->upload()) {
                $xml = simplexml_load_file($model->getPath());
                $xml = $xml->result->ROWSET->ROW;
                foreach ($xml as $item) {
                    $plan = new Plans();
                    $plan->plan_id = (integer) $item->PLAN_ID;
                    $plan->plan_name = (string) $item->PLAN_NAME[0];
                    $plan->plan_group = $item->PLAN_GROUP_ID;
                    $plan->active_form = date_create($item->ACTIVE_FROM)->format('Y-m-d H:i:s');
                    $plan->active_to = date('Y-m-d H:i:s');
                    $plan->company_id = (integer) $item->COMPANY_ID;
                    if (!$plan->save()) {
                        var_dump($plan->errors);
                        return;
                    }
                }

                $message = 'Данные успешно экспортированы';
            }
        }

        return $this->render('index', compact('model', 'message'));
    }

    public function actionAddproperty() {
        $model = new UploadForm();
        $message = '';

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->upload()) {
                $xml = simplexml_load_file($model->getPath());
                $xml = $xml->result->ROWSET->ROW;

                foreach ($xml as $item) {
                    $property = new PlansProperty();
                    $property->property_id = $item->PROPERTY_ID;
                    $property->property_type_id = $item->PROPERTY_TYPE_ID;
                    $property->active_from = date_create($item->ACTIVE_FROM)->format('Y-m-d H:i:s');
                    $property->active_to = date('Y-m-d H:i:s');
                    $property->plan_id = $item->PLAN_ID;
                    $property->prop_value = (integer) $item->PROP_VALUE;

                    if (!$property->save()) {
                        var_dump($property->errors);
                        return;
                    }
                }

                $message = 'Данные успешно экспортированы';
            }
        }

        return $this->render('index1', compact('model', 'message'));
    }
}