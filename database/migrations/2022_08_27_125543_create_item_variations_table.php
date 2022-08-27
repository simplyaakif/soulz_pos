<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {

        public function up()
        {
            Schema::create('item_variations', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('item_id');
                $table->string('title');
                $table->string('price');
                $table->string('short_description')->nullable();

                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('item_variations');
        }
    };
