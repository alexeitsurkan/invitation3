<?php

/**
 * Class M210504201701PersonTable
 */
class M210504201701PersonTable extends \yii\db\Migration
{

    public $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%person}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'name' => $this->string()->notNull(),
            'status' => $this->boolean(),
            'question' => $this->smallInteger(),
            'answer' => $this->string(),
            'key' => $this->string(),
        ], $this->tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%person}}');
    }
}
