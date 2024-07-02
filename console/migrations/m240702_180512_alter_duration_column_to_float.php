<?php

use yii\db\Migration;

/**
 * Class m240702_180512_alter_duration_column_to_float
 */
class m240702_180512_alter_duration_column_to_float extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%film}}', 'duration', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%film}}', 'duration', $this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240702_180512_alter_duration_column_to_float cannot be reverted.\n";

        return false;
    }
    */
}
