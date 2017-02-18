<?php

use yii\db\Migration;

class m170209_021305_create_tb_m_jabatan extends Migration
{
    const TABLE_NAME = 'tb_m_jabatan';
    public function up()
    {
       
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'parent' => $this->integer()->defaultValue(0),
            'lvl' => $this->smallInteger(5)->notNull(),
            'kode_jabatan' => $this->string(50)->notNull()->unique(),
            'nama_jabatan' => $this->string(50)->notNull(),
            'ket' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),

        ]);
        $this->createIndex('tree_NK1', self::TABLE_NAME, 'parent');
        $this->createIndex('tree_NK4', self::TABLE_NAME, 'lvl');
        
        
        
    }

    public function down()
    {
         $this->dropTable(self::TABLE_NAME);
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
