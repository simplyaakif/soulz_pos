<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {

        public function up()
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id');
                $table->bigInteger('total_amount');
                $table->integer('items_count');
                $table->string('paid_in');
                //

                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('orders');
        }
    };
