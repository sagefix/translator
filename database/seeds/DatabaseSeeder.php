<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Translation;

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
        DB::table('translation')->delete();
        $items = array(
            ['english' => 'This', 'armenian' => 'այս', 'persian' => 'اس'],
            ['english' => 'That', 'armenian' => 'որ', 'persian' => 'کہ']
        );
        foreach ($items as $item)
        {
            Translation::create($item);
        }
        Model::reguard();
    }
}
