<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 3);
            $table->integer('quantity')->default(0);
            $table->text('details')->nullable();
            $table->string('image')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->decimal('discount',3,0)->default(0);
            $table->decimal('discounted_price',10, 3);
        });
        DB::unprepared('
        CREATE TRIGGER update_discounted_price_after_update
        BEfore UPDATE ON products
        FOR EACH ROW
        BEGIN
            IF NEW.discount = 0 THEN
                SET NEW.discounted_price = NEW.price;
            ELSE
             SET NEW.discounted_price = NEW.price - ((NEW.price * NEW.discount) / 100);
            END IF;
        END;');
        DB::unprepared('
        CREATE TRIGGER update_discounted_price_before_insert
        BEfore INSert ON products
        FOR EACH ROW
        BEGIN
            IF NEW.discount = 0 THEN
                SET NEW.discounted_price = NEW.price;
            ELSE
            SET NEW.discounted_price = NEW.price - ((NEW.price * NEW.discount) / 100);
            END IF;
        END;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_discounted_price_after_update');
        DB::unprepared('DROP TRIGGER IF EXISTS update_discounted_price_before_insert');
        Schema::dropIfExists('products');
    }
};
