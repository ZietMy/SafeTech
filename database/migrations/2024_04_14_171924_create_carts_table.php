<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('quantity_purchase');
            $table->decimal('total')->default(0);
            $table->timestamps();
        });
       
        DB::unprepared('
            
            CREATE TRIGGER update_total_after_insert
            BEFORE INSERT ON carts
            FOR EACH ROW
            BEGIN
                SET NEW.total = NEW.quantity_purchase * (SELECT discounted_price FROM products WHERE id = NEW.product_id);
            END;
        ');

        // Create trigger after update on carts table
        DB::unprepared('
        CREATE TRIGGER update_total_after_update
        BEFORE UPDATE ON carts
        FOR EACH ROW
        BEGIN
            SET NEW.total = NEW.quantity_purchase * (SELECT discounted_price FROM products WHERE id = NEW.product_id);
        END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
       DB::unprepared('DROP TRIGGER IF EXISTS update_total_after_insert');
       DB::unprepared('DROP TRIGGER IF EXISTS update_total_after_update');
        
        Schema::dropIfExists('carts');
    }
};
