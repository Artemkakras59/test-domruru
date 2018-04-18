<?php

use yii\db\Migration;
use yii\db\Schema;

class m180418_162937_AddTablePlansProperties extends Migration
{
   public function up() {
       $this->createTable('plans_property', [
           'property_id' => Schema::TYPE_PK,
           'property_type_id' => Schema::TYPE_INTEGER . ' NOT NULL',
           'active_from' => Schema::TYPE_DATE . ' NOT NULL',
           'active_to' => Schema::TYPE_DATE . ' NOT NULL',
           'plan_id' => Schema::TYPE_INTEGER . ' NOT NULL',
           'prop_value' => Schema::TYPE_INTEGER . ' NOT NULL',
       ]);
   }

   public function down() {
        $this->dropTable('plans_property');
   }
}
