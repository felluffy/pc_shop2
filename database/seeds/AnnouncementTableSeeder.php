<?php

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::create([
            'title' => 'instance',
            'content' => 'fastened weigh spider smile station kind something series mark actually important more pick uncle equally coach cause grade pride health green tiny symbol into1Anim eiusmod ullamco proident ex elit.'
        ]);

        Announcement::create([
            'title' => 'torn',
            'content' => 'replied that season enemy page square yet town chapter lost cost these fish tank bare pole port equator egg hot found somewhere believed harder'
        ]);

        Announcement::create([
            'title' => 'applied',
            'content' => 'active work eye pink we there snake but us glad leg sleep trunk sang source itself table remember pay more away buy amount especially3Anim eiusmod ullamco proident ex elit.'
        ]);

        Announcement::create([
            'title' => 'picture',
            'content' => 'Aute ipsum ad ea dolore eiusmod ut cupidatat veniam aliquip labore.'
        ]);
        Announcement::create([
            'title' => 'wonderful',
            'content' => 'Dolor pariatur amet irure aliqua anim fugiat ex esse sunt.'
        ]);
        Announcement::create([
            'title' => 'hay',
            'content' => 'Non ullamco do esse tempor mollit minim.'
        ]);
    }
}
