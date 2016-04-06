<?php

class m131023_164416_initial extends ZDbMigration
{

    public function up()
    {

        $this->addColumn('user', 'secondery_email', "VARCHAR(255) NOT NULL");
        $this->addColumn('user', 'secondery_password', "VARCHAR(255) NOT NULL");
    }

    public function down()
    {
        echo "m131023_164513_initial does not support migration down.\n";
        return false;
    }
}