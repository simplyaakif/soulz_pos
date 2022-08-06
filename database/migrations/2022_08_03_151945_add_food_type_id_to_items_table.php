<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {

        public function up()
        {
            Schema::table('items', function (Blueprint $table) {
                $table->bigInteger('food_type_id')->nullable();
                $table->boolean('is_active')->default(1);

            });
        }

        public function down()
        {
            Schema::table('items', function (Blueprint $table) {
                //
            });
        }
    };
