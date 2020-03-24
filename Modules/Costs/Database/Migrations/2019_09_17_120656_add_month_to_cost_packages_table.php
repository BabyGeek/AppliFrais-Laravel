<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonthToCostPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cost_packages', function (Blueprint $table) {
            $table->string('month')->after('date')->default(Carbon\Carbon::now()->format('mY'))->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cost_packages', function (Blueprint $table) {
            $table->dropColumn(['month']);
        });
    }
}
