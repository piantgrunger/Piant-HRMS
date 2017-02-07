<?php

use yii\db\Migration;

class m170206_074026_create_tb_m_jns_absen extends Migration
{
    public function up()
    {
     $this->createTable('tb_m_jns_absen',
          ['id_jns_absen'=>$this->primaryKey(),
          'kode_jns_absen'=>$this->string(20)->notNull()->unique(),
          'nama_jns_absen'=>$this->string(50)->notNull(),
          'potong_premi_hadir'=>"Enum('Ya','Tidak')"   , 
          'potong_gaji'=>"Enum('Ya','Tidak')"   , 
          'hadir'=>"Enum('Ya','Tidak')"   , 
              
              
          'ket'=>$this->text(),
          'created_at'=>$this->datetime(),
          'updated_at'=>$this->datetime(),


        ]);
    }

    public function down()
    {
        $this->dropTable('tb_m_jns_absen');
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
