<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateImageDefaultInProfilesTable extends Migration
{
    public function up()
    {
        // Use raw SQL queries to update the default value
        DB::statement("ALTER TABLE profiles ADD COLUMN image_temp VARCHAR DEFAULT 'profile/Default_pfp.svg.png'");
        DB::statement("UPDATE profiles SET image_temp = 'profile/Default_pfp.svg.png' WHERE image IS NULL");
        DB::statement("ALTER TABLE profiles DROP COLUMN image");
        DB::statement("ALTER TABLE profiles RENAME COLUMN image_temp TO image");
    }

    public function down()
    {
        // Revert the changes
        DB::statement("ALTER TABLE profiles ADD COLUMN image_temp VARCHAR DEFAULT NULL");
        DB::statement("UPDATE profiles SET image_temp = NULL WHERE image = 'profile/Default_pfp.svg.png'");
        DB::statement("ALTER TABLE profiles DROP COLUMN image");
        DB::statement("ALTER TABLE profiles RENAME COLUMN image_temp TO image");
    }
}
