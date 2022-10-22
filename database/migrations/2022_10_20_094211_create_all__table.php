<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //bang roles
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        //bang slide
        Schema::create('slide', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('link');
            $table->timestamps();
        });

        //bang status
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        //bang categories
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('active');
            $table->timestamps();
        });

        //bang suppliers
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');            
            $table->integer('active');
            $table->timestamps();
        });

        //bang users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('role_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address');
            $table->string('phone_number');
            $table->string('gender');
            $table->integer('active');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('role');
        });

        //bang product
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('description');
            $table->string('image');            
            $table->integer('amount');
            $table->double('price');            
            $table->string('unit');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category');
        });

        //bang orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date');     
            $table->double('total');            
            $table->text('note');           
            $table->string('payment');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });

        //bang orderdetails
        Schema::create('orderdetail', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('status_id');
            $table->integer('quantity');     
            $table->double('price');    
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('order');
            $table->foreign('product_id')->references('id')->on('product'); 
            $table->foreign('status_id')->references('id')->on('status');            
        });

        //bang purchases
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('supplier_id');
            $table->date('date');
            $table->double('total');
            $table->text('note');
            $table->string('payment');
            $table->timestamps();            
            $table->foreign('user_id')->references('id')->on('users');  
            $table->foreign('supplier_id')->references('id')->on('supplier');
        });

        //bang purchasedetails
        Schema::create('purchasedetail', function (Blueprint $table) {
            $table->id('purchase_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->double('price');
            $table->timestamps();
            $table->foreign('purchase_id')->references('id')->on('purchases');  
            $table->foreign('product_id')->references('id')->on('product');  
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
        Schema::dropIfExists('slide');
        Schema::dropIfExists('status');
        Schema::dropIfExists('category');
        Schema::dropIfExists('supplier');
        Schema::dropIfExists('users');
        Schema::dropIfExists('product');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('orderdetail');
        Schema::dropIfExists('purchases');        
        Schema::dropIfExists('purchasedetail');
    }
};
