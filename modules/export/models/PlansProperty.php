<?php

namespace app\modules\export\models;

use Yii;

/**
 * This is the model class for table "plans_property".
 *
 * @property int $property_id
 * @property int $property_type_id
 * @property string $active_from
 * @property string $active_to
 * @property int $plan_id
 * @property int $prop_value
 *
 * @property Plans $plan
 */
class PlansProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plans_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['property_type_id', 'active_from', 'active_to', 'plan_id', 'prop_value'], 'required'],
            [['property_type_id', 'plan_id', 'prop_value'], 'integer'],
            [['active_from', 'active_to'], 'safe'],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plans::className(), 'targetAttribute' => ['plan_id' => 'plan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'property_id' => 'Property ID',
            'property_type_id' => 'Property Type ID',
            'active_from' => 'Active From',
            'active_to' => 'Active To',
            'plan_id' => 'Plan ID',
            'prop_value' => 'Prop Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plans::className(), ['plan_id' => 'plan_id']);
    }
}
