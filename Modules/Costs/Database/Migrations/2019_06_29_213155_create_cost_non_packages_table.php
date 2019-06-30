<?php

use Modules\Costs\Enum\CostState;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostNonPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_non_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->float('value')->nullable();
            $table->string('label')->nullable();
            $table->string('slug')->nullable();
            $table->string('justificatory')->nullable();
            $table->bigInteger('justificatory_number')->nullable();
            $table->string('state')->default(CostState::defaultValue())->index();
            $table->date('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cost_non_packages');
    }
}
