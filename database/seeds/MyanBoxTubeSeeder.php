<?php

use Illuminate\Database\Seeder;
use App\Myanboxtube;
class MyanBoxTubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Myanboxtube::create([
            'title'=>'complete construction of RCC -DESIGN',
            'link' =>'https://www.youtube.com/watch?v=_A7_tfvt0UY',
            'image'=>'1.png'
        ]);
        Myanboxtube::create([
            'title'=>'Construction House Step Step By Step, How To Build Foundation From Ready-Mixed Concrete',
            'link' =>'https://www.youtube.com/watch?v=jsQNIkWWug4',
            'image'=>'1.png'
        ]);
    }
}
