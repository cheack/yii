<?php

use yii\db\Migration;

class m160409_083848_reviews extends Migration
{
    public function up()
    {
        $this->createTable('reviews', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer(4)->notNull(),
            'name' => $this->string(50),
            'text' => $this->string(1024)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

        $this->addForeignKey(
            'fk-reviews_type-id',
            'reviews',
            'type_id',
            'review_type',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('reviews');
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
