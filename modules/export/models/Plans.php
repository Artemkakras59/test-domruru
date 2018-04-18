<?php

namespace app\modules\export\models;

use Yii;

/**
 * This is the model class for table "plans".
 *
 * @property int $plan_id
 * @property string $plan_name
 * @property int $plan_group
 * @property string $active_form
 * @property string $active_to
 * @property int $company_id
 *
 * @property PlansProperty[] $plansProperties
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_name', 'plan_group', 'active_form', 'active_to'], 'required'],
            [['plan_group', 'company_id'], 'integer'],
            [['active_form', 'active_to'], 'safe'],
            [['plan_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'plan_id' => 'Plan ID',
            'plan_name' => 'Plan Name',
            'plan_group' => 'Plan Group',
            'active_form' => 'Active Form',
            'active_to' => 'Active To',
            'company_id' => 'Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlansProperties()
    {
        return $this->hasMany(PlansProperty::className(), ['plan_id' => 'plan_id']);
    }
}
