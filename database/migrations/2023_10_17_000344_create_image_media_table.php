<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('image_media', function (Blueprint $table) {
            $table->id();
            $table->string('image_name')->require();
            $table->string('image_path')->require();
            $table->string('image_type')->require(); {/** image type is related to the model it is associated with e.g. for Model user, image_type will be User-Image */}
            $table->integer('associated_id')->require(); {/** id of Model asscociated with the image */}
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_media');
    }
};
