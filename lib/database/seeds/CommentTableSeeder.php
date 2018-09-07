<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
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
    			'com_star'=>4,
    			'com_title'=>'Hay lắm',
    			'com_content'=>'Khóa học khá là hữu ích và mình học đưuọc rất nhiều',
    			'com_acc_id'=>11,
    			'com_cou_id'=>5
    		],
    		[
    			'com_star'=>5,
    			'com_title'=>'Đưuọc đó',
    			'com_content'=>'Khóa học này cực kì hay .. và giáo viên rât xinh đẹp',
    			'com_acc_id'=>8,
    			'com_cou_id'=>1
    		],
    		[
    			'com_star'=>1,
    			'com_title'=>'Chán lắm',
    			'com_content'=>'Khóa học chả hay gì cả , giáo viên còn xấu nữa',
    			'com_acc_id'=>11,
    			'com_cou_id'=>3
    		]
    	];
        DB::table('comment')->insert($data);
    }
}
