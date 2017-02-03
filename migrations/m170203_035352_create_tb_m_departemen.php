<?php

use yii\db\Migration;

class m170203_035352_create_tb_m_departemen extends Migration
{
    public function up()
    {
         $this->createTable('tb_m_departemen',
          ['id_departemen'=>$this->primaryKey(),
          'id_divisi'=>$this->integer()->notNull(),
          'kode_departemen'=>$this->string(20)->notNull()->unique(),
          'nama_departemen'=>$this->string(50)->notNull(),
          'ket'=>$this->text(),
          'created_at'=>$this->datetime(),
          'updated_at'=>$this->datetime(),


        ]);

        
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tb_m_departemen-id_divisi',
            'tb_m_departemen',
            'id_divisi',
            'tb_m_divisi',
            'id_divisi',
            'CASCADE'
        );
    }

    public function down()
    {
      $this->dropForeignKey( 
            'fk-tb_m_departemen-id_divisi',
            'tb_m_departemen'
          
      );
      $this->dropTable('tb_m_departemen');
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
