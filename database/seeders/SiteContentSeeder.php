<?php

namespace Database\Seeders;
use App\Models\SiteContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SiteContent::create([
        //    'name' =>'banner',
        //    'content' => json_encode([
        //      'title' => 'Every Student Yearns To Learn',
        //      'subtitle' => 'Make Your Students World Better',
        //      'desc' => 'Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great youll male grass yielding yielding man',
        //    ])
        // ]);

        SiteContent::create([
            'name' =>'courses',
            'content' => json_encode([
              'title' => 'Our Courses',
              'subtitle' => 'Different Categories',
            ])
         ]);
    }
}
