<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%currency}}`.
 */
class m200721_213707_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%currency}}', [
            'valuteID' => "varchar(50) NOT NULL",
            'numCode' => "int NOT NULL",
            'сharCode' => "varchar(10)NOT NULL",
            'name' => "varchar(255)",
            'value' => "float NOT NULL",
            'date' => "date NOT NULL",

        ]);
        $this->createIndex(
            'date',
            'currency',
            'date'
         );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency}}');
    }
}
