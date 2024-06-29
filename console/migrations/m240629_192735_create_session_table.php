<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%session}}`.
 */
class m240629_192735_create_session_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%session}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'time' => $this->time()->notNull(),
            'cost' => $this->decimal(10, 2)->notNull(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-session-film_id}}',
            '{{%session}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-session-film_id}}',
            '{{%session}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-session-film_id}}',
            '{{%session}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-session-film_id}}',
            '{{%session}}'
        );

        $this->dropTable('{{%session}}');
    }
}
