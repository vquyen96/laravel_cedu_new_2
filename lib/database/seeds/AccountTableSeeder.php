<?php

use Illuminate\Database\Seeder;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[	
        		'name'=>'admin1112',
        		'email'=>'admin001@cphonevn.com',
        		'password'=>bcrypt('admin'),
        		'job'=>'Sếp',
        		'content'=>'Thân thiện',
        		'level'=>1
        	],
        	[	
        		'name'=>'q.uyen1996',
        		'email'=>'quyendo.site4@cphonevn.com',
        		'password'=>bcrypt('9876543210'),
        		'job'=>'Sếp',
        		'content'=>'Thân thiện',
        		'level'=>1
        	]
        	
        ];
        DB::table('accounts')->insert($data);
    }
}
