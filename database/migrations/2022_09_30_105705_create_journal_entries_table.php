<?php

use App\Models\ArtPiece;
use App\Models\JournalEntries;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ArtPiece::class);
            $table->foreignId('artist')->references('id')->on('users');
            $table->string('title');
            $table->text('description');
            $table->text('materials');
            $table->string('photo_url');
            $table->boolean('published');
            $table->date('received_at');
            $table->foreignId('sent_to')->references('id')->on('users');
            $table->date('sent_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal_entries');
    }
};
