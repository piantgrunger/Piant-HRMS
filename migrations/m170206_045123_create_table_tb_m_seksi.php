<?php

use yii\db\Migration;

class m170206_045123_create_table_tb_m_seksi extends Migration
{
    public function up()
    {

          $this->createTable('tb_m_seksi',
          ['id_seksi'=>$this->primaryKey(),
          'id_departemen'=>$this->integer()->notNull(),
          'kode_seksi'=>$this->string(20)->notNull()->unique(),
          'nama_seksi'=>$this->string(50)->notNull(),
          'ket'=>$this->text(),
          'created_at'=>$this->datetime(),
          'updated_at'=>$this->datetime(),


        ]);

        
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-tb_m_seksi-id_departemen',
            'tb_m_seksi',
            'id_departemen',
            'tb_m_departemen',
            'id_departemen',
            'CASCADE'
        );
    }

    public function down()
    {
     $this->dropForeignKey( 
            'fk-tb_m_departemen-id_departemen',
            'tb_m_departemen'
          
      );
      $this->dropTable('tb_m_seksi');
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
