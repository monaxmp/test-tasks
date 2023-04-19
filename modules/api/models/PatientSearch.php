<?php

namespace app\modules\api\models;


/**
 * UserSearch represents the model behind the search form about `webvimark\modules\UserManagement\models\User`.
 */
class PatientSearch  extends \app\models\PatientSearch
{
    /**
     * @return array
     */
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['created_by'],$fields['updated'],$fields['updated_by'],$fields['created'],$fields['recovery_date'],$fields['analysis_date']);
        return $fields;
    }

    /**
     * @return array|string[]
     */
    public function extraFields()
    {
        return [
            "status", "polyclinic", "treatment", "formDisease"
        ];
    }
}
