<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {

        public function up()
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->bigInteger('subtotal_amount')->nullable();
                $table->bigInteger('discount_amount')->nullable();
                $table->bigInteger('tax_amount')->nullable();
            });
        }

        public function down()
        {
            Schema::table('orders', function (Blueprint $table) {
                $table->bigInteger('subtotal_amount')->nullable();
                $table->bigInteger('discount_amount')->nullable();
                $table->bigInteger('tax_amount')->nullable();
            });
        }
    };
