<?php

use Illuminate\Database\Seeder;
use App\Blog;
use Flynsarmy\CsvSeeder\CsvSeeder;

class BlogsTableSeeder extends CsvSeeder
{

    public function __construct()
	{
		$this->table = 'blogs';
		$this->filename = base_path().'/database/seeds/csvs/blog_csv.csv';
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::disableQueryLog();
  

		parent::run();
    }
}
