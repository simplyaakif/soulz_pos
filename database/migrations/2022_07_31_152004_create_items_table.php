<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {

        public function up()
        {
            Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('img')->nullable();
                $table->string('icon')->nullable();
                $table->string('price');



                //

                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('items');
        }
    };
