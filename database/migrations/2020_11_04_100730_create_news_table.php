<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->default('');
            $table->text('content')->nullable();
            $table->string('author', 100)->default('');
            $table->boolean('published')->default(0);
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });

        // Seed table news
        $news = [];

        $news[] = ["id" => "1", "title" => "PICE Software Inc.", "content" => "<h2><strong>Basic Card Example</strong></h2>
        <p><strong><a href='http://pice-software.com'>PICE Software</a></strong></p>", "author" => "Jesús González Memije", "published" => "0"];
        $news[] = ["id" => "2", "title" => "Cost Jalisco, GDL.", "content" => "", "author" => "", "published" => "0"];

        $date = Carbon::now();

        // Create rows
        foreach($news as $new)
        {
            DB::table('news')->insert([
                'id'         => $new['id'],
                'title'      => $new['title'],
                'content'    => $new['content'],
                'author'     => $new['author'],
                'published'  => $new['published'],
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
