<?php

use App\Ayar;
use Illuminate\Database\Seeder;

class AyarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ayar::create(["name"=>"title","value"=>"Haci'nin Evi"]);
        Ayar::create(["name"=>"author","value"=>"Hacı Kandemir"]);
        Ayar::create(["name"=>"description","value"=>"Kişisel Blog"]);
        Ayar::create(["name"=>"keywords","value"=>"php,html,css,framework,dünya:/"]);
        Ayar::create(["name"=>"facebook","value"=>"http://facebook.com"]);
        Ayar::create(["name"=>"twitter","value"=>"http://twitter.com"]);
        Ayar::create(["name"=>"github","value"=>"http://githup.com"]);
    }
}
