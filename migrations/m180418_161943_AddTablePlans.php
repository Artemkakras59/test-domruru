<?php

use yii\db\Migration;
use yii\db\Schema;

class m180418_161943_AddTablePlans extends Migration
{
    public function up() {
        $this->createTable('plans', [
            'plan_id' => Schema::TYPE_INTEGER,
            'plan_name' => Schema::TYPE_STRING . ' NOT NULL',
            'plan_group' => Schema::TYPE_INTEGER . ' NOT NULL',
            'active_form' => Schema::TYPE_DATE . ' NOT NULL',
            'active_to' => Schema::TYPE_DATE . ' NOT NULL',
            'company_id' => Schema::TYPE_INTEGER,
        ]);

        $this->addPrimaryKey('plan_id', 'plans', 'plan_id');
    }

    public function down() {
        $this->dropTable('plans');
    }
}
