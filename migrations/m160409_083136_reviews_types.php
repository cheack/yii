<?php

use yii\db\Migration;

class m160409_083136_reviews_types extends Migration
{
    public function up()
    {
        $this->createTable('review_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()
        ]);

        $this->insert('review_type', array('name' => 'Жалоба'));
        $this->insert('review_type', array('name' => 'Предложение'));
        $this->insert('review_type', array('name' => 'Другое'));
    }

    public function down()
    {
        $this->dropTable('review_type');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
