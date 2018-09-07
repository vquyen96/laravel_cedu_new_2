<?php

use Illuminate\Database\Seeder;

class RatingTableSeeder extends Seeder
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
    			'rat_star'=>4,
    			'rat_title'=>'Hay lắm',
    			'rat_content'=>'Khóa học khá là hữu ích và mình học đưuọc rất nhiều',
    			'rat_acc_id'=>11,
    			'rat_cou_id'=>6
    		],
    		[
    			'rat_star'=>5,
    			'rat_title'=>'Đưuọc đó',
    			'rat_content'=>'Khóa học này cực kì hay .. và giáo viên rât xinh đẹp',
    			'rat_acc_id'=>8,
    			'rat_cou_id'=>7
    		],
    		[
    			'rat_star'=>1,
    			'rat_title'=>'Chán lắm',
    			'rat_content'=>'Khóa học chả hay gì cả , giáo viên còn xấu nữa',
    			'rat_acc_id'=>11,
    			'rat_cou_id'=>1
    		],
            [
                'rat_star'=>4,
                'rat_title'=>'Hay lắm',
                'rat_content'=>'Khóa học khá là hữu ích và mình học đưuọc rất nhiều',
                'rat_acc_id'=>11,
                'rat_cou_id'=>1
            ],
            [
                'rat_star'=>5,
                'rat_title'=>'Đưuọc đó',
                'rat_content'=>'Khóa học này cực kì hay .. và giáo viên rât xinh đẹp',
                'rat_acc_id'=>8,
                'rat_cou_id'=>3
            ],
            [
                'rat_star'=>1,
                'rat_title'=>'Chán lắm',
                'rat_content'=>'Khóa học chả hay gì cả , giáo viên còn xấu nữa',
                'rat_acc_id'=>11,
                'rat_cou_id'=>4
            ]
    	];
        DB::table('rating')->insert($data);
    }
}
