<?php

namespace app\modules\api;

use app\models\User;
use Yii;

/**
 * api module definition class
 */
class modules extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        if (!Yii::$app->user->identity && Yii::$app->request->get('auth_key')) {

            $user = User::findOne(['auth_key' => Yii::$app->request->get('auth_key')]);

            if ($user) {
                Yii::$app->user->login($user);
            }

        }
    }


    /**
     * @return array|\string[][]
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }
}
