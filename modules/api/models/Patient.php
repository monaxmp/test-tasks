<?php

namespace app\modules\api\models;

use Yii;
use yii\db\Expression;


/**
 * This is the model class for table "patients".
 *
 * @property int $id
 * @property string $name
 * @property string|null $birthday
 * @property string|null $phone
 * @property string|null $address
 * @property int|null $polyclinic_id
 * @property int|null $treatment_id
 * @property int|null $status_id
 * @property int|null $form_disease_id
 * @property string|null $created
 * @property int|null $created_by
 * @property string|null $updated
 * @property int|null $updated_by
 * @property string|null $diagnosis_date
 * @property string|null $recovery_date
 * @property string|null $analysis_date
 * @property int|null $source_id
 *
 * @property FormDiseases $formDisease
 * @property Patient $source
 * @property Patient[] $patients
 * @property Polyclinics $polyclinic
 * @property Statuses $status
 * @property Treatments $treatment
 * @property User $createdBy
 * @property User $updatedBy
 */
class Patient extends \app\models\Patient
{
    /**
     * @return array|array[]
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['polyclinic_id', 'treatment_id', 'status_id', 'form_disease_id', 'created_by', 'updated_by', 'source_id'], 'default', 'value' => 2],
            [['birthday', 'diagnosis_date', 'recovery_date', 'analysis_date'], 'date', 'format' => 'Y-m-d H:i:s'],
            [['birthday', 'diagnosis_date', 'recovery_date', 'analysis_date'], 'default', 'value' => new Expression("NULL")],
        ]);
    }
}
