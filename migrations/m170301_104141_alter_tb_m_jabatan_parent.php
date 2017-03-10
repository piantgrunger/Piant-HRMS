<?php

use yii\db\Migration;

class m170301_104141_alter_tb_m_jabatan_parent extends Migration
{
    public function up()
    {
        $this->execute("ALTER TABLE `tb_m_jabatan` CHANGE `parent` `parent_id` INT(11) NULL DEFAULT '0'");
    }

    public function down()
    {
       // echo "m170301_104141_alter_tb_m_jabatan_parent cannot be reverted.\n";

        return true;
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
