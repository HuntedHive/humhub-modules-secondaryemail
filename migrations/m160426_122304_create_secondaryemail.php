<?php

class m160426_122304_create_secondaryemail extends EDbMigration
{
	public function up()
	{
		$this->addColumn('user', 'secondery_email', "VARCHAR(255) NOT NULL");
		$this->addColumn('user', 'secondery_password', "VARCHAR(255) NOT NULL");
	}

	public function down()
	{
		echo "m160426_122304_create_secondaryemail does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}