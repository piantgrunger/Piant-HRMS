<?php

use yii\db\Migration;

class m170131_031142_create_tb_m_div extends Migration
{
    public function up()
    {
       $this->createTable('tb_m_divisi',
          ['id_divisi'=>$this->primaryKey(),
          'kode_divisi'=>$this->string(20)->notNull()->unique(),
          'nama_divisi'=>$this->string(50)->notNull(),
          'ket'=>$this->text(),
          'created_at'=>$this->datetime(),
          'updated_at'=>$this->datetime(),


        ]
      );
    }

    public function down()
    {
      $this->dropTable('tb_m_divisi');
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
