<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'journal_items', function (Blueprint $table){
            $table->id();
            $table->integer('journal')->default(0);
            $table->integer('account')->default(0);
            $table->text('description')->nullable();
            $table->double('debit', 25, 2)->default(0.0);
            $table->double('credit', 25, 2)->default(0.0);
            $table->timestamps();
        }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal_items');
    }
}
