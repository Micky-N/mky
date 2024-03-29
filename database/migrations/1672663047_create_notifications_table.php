<?php


use MkyCore\Abstracts\Migration;
use MkyCore\Migration\MigrationTable;
use MkyCore\Migration\Schema;

class createNotificationsTable extends Migration
{

    public function up()
    {
        Schema::create('notifications', function (MigrationTable $table) {
            $table->id()->autoIncrement();
            $table->string('entity', 40);
            $table->string('entity_id', 40);
            $table->string('type');
            $table->text('data');
            $table->string('read_at', 40);
            $table->dates();
        });
    }

    public function down()
    {
        Schema::dropTable('notifications');
    }

}