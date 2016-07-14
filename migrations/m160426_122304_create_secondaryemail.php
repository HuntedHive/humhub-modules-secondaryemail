<?php

use yii\db\Migration;


class m160426_122304_create_secondaryemail extends Migration
{
	public function up()
	{
		$this->addColumn('user', 'secondary_email', "VARCHAR(255) NOT NULL");
		$this->addColumn('user', 'secondary_password', "VARCHAR(255) NOT NULL");
	}

	public function down()
	{
		$this->dropColumn('user', 'secondary_email');
		$this->dropColumn('user', 'secondary_password');
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