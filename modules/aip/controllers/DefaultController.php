<?php

namespace app\modules\aip\controllers;

use app\modules\aip\models\Patient;
use app\models\User;
use Yii;
use app\modules\aip\models\PatientSearch;
use yii\rest\Controller;
use yii\web\Response;


/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{

    /**
     * @return array|array[]
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }


    /**
     * @return \yii\data\ActiveDataProvider
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->get();
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(['PatientSearch' => $params]);

        return $dataProvider;
    }


    /**
     * @return array|int
     */
    public function actionCreate()
    {

        $model = new Patient();

        $user = User::findOne(Yii::$app->user->id);

        if ($model->load(['Patient'=>Yii::$app->request->post()])) {

            $model->created = date("Y-m-d H:i:s");
            $model->updated = date("Y-m-d H:i:s");
            $model->created_by = \Yii::$app->user->id;
            $model->updated_by = \Yii::$app->user->id;
            $model->birthday = $model->birthday ? date("Y-m-d", strtotime($model->birthday)) : null;

            if (!Yii::$app->user->isSuperadmin) {
                $model->polyclinic_id = $user->polyclinic_id;
            }

            if ($model->save()) {
                return $model->id;
            }else return $model->getErrors();

        } else  return $model->getErrors();
    }

}
