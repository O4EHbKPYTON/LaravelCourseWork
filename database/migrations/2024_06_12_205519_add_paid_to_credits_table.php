<?php

// database/migrations/xxxx_xx_xx_add_paid_to_credits_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToCreditsTable extends Migration
{
    public function up()
    {
        Schema::table('credits', function (Blueprint $table) {
            $table->boolean('paid')->default(false);
        });
    }

    public function down()
    {
        Schema::table('credits', function (Blueprint $table) {
            $table->dropColumn('paid');
        });
    }
}
