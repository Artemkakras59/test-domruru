<?php

use yii\db\Migration;

/**
 * Class m180418_163518_AddForeignKey
 */
class m180418_163518_AddForeignKey extends Migration
{
    public function up() {
        $this->createIndex(
            'plan_id-idx',
            'plans_property',
            'plan_id'
        );

        $this->addForeignKey(
            'fk-plan_id',
            'plans_property',
            'plan_id',
            'plans',
            'plan_id',
            'CASCADE'
        );
    }

    public function down() {
        $this->dropForeignKey(
            'fk-plan_id',
            'plans_property'
        );

        $this->dropIndex(
            'plan_id-idx',
            'plans_property'
        );
    }
}
