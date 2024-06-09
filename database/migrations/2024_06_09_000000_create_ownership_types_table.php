<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnershipTypesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ownership_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $ownershipTypes = [
            'Частная собственность',
            'Государственная собственность',
            'Коллективная собственность',
            'Общественная собственность',
            'Частно-коллективная собственность',
            'Корпоративная собственность',
        ];

        foreach ($ownershipTypes as $type) {
            \App\Models\OwnershipTypes::create(['name' => $type]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ownership_types');
    }
}
