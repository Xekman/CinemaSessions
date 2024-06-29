<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film}}`.
 */
class m240629_192734_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'duration' => $this->integer()->notNull(),
            'age_limit' => $this->integer()->notNull(),
            'photo_extension' => $this->string(4)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%film}}');
    }
}
