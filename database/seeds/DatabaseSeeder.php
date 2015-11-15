<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $counts = array(10);
        foreach($counts as $count){
            DB::table('articles')->insert([
                'title' => str_random(10),
                'author' => str_random(10),
                'description' => 'The groundscraper thrush Psophocichla litsitsirupa is a passerine bird of southern and eastern Africa',
            ]);
        }
        foreach($counts as $count){
            DB::table('articles')->insert([
                'title' => str_random(10),
                'author' => str_random(10).'@gmail.com',
                'description' => 'There are four subspecies: P. l. litsitsirupa is the most southerly form, occurring from Namibia, Botswana',
            ]);
        }

        Model::reguard();
    }
}
