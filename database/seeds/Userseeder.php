<?php

use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  App\User::create([
            'name'=>'moktar',
            'email'=>'moktarb911@gmail.com',
            'password'=>bcrypt('password'),
            'admin'=> 1,

        ]);


       App\Profile::create([
           'user_id'=>$user->id,
           'avatar'=>'https://st3.depositphotos.com/7157796/17738/v/1600/depositphotos_177389638-stock-illustration-captain-america-vector-illustration.jpg',
           'github_url'=>'https://github.com',
           'twitter_url'=>'https://twitter.com',
           'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
       ]);
    }
}
