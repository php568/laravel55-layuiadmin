<?php

use App\Models\Dict;
use Illuminate\Database\Seeder;

class DictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_time_limit(0);
        //清空表
        Dict::truncate();

        $info = [
            [   //产品颜色
                'group_name' => 'product_color',
                'items' => [
                    [
                        'code' => '贵妇肤',
                        'value' => '贵妇肤',
                        'desc' => '贵妇肤',
                        'sort' => 1,
                    ],
                    [
                        'code' => '靓肤',
                        'value' => '靓肤',
                        'desc' => '靓肤',
                        'sort' => 2,
                    ],
                    [
                        'code' => '明杏',
                        'value' => '明杏',
                        'desc' => '明杏',
                        'sort' => 3,
                    ],
                    [
                        'code' => '简灰',
                        'value' => '简灰',
                        'desc' => '简灰',
                        'sort' => 4,
                    ],
                    [
                        'code' => '气质灰',
                        'value' => '气质灰',
                        'desc' => '气质灰',
                        'sort' => 5,
                    ],
                    [
                        'code' => '雅灰',
                        'value' => '雅灰',
                        'desc' => '雅灰',
                        'sort' => 6,
                    ],
                    [
                        'code' => '劲蓝',
                        'value' => '劲蓝',
                        'desc' => '劲蓝',
                        'sort' => 7,
                    ],
                    [
                        'code' => '抹绿',
                        'value' => '抹绿',
                        'desc' => '抹绿',
                        'sort' => 8,
                    ],
                    [
                        'code' => '慕绿',
                        'value' => '慕绿',
                        'desc' => '慕绿',
                        'sort' => 9,
                    ],
                    [
                        'code' => '酷黑',
                        'value' => '酷黑',
                        'desc' => '酷黑',
                        'sort' => 10,
                    ],
                    [
                        'code' => '魅黑',
                        'value' => '魅黑',
                        'desc' => '魅黑',
                        'sort' => 11,
                    ],
                    [
                        'code' => '雅典黑',
                        'value' => '雅典黑',
                        'desc' => '雅典黑',
                        'sort' => 12,
                    ],
                    [
                        'code' => '品红',
                        'value' => '品红',
                        'desc' => '品红',
                        'sort' => 13,
                    ],
                    [
                        'code' => '身态红',
                        'value' => '身态红',
                        'desc' => '身态红',
                        'sort' => 14,
                    ],
                    [
                        'code' => '熙红',
                        'value' => '熙红',
                        'desc' => '熙红',
                        'sort' => 15,
                    ],
                    [
                        'code' => '尚绯',
                        'value' => '尚绯',
                        'desc' => '尚绯',
                        'sort' => 16,
                    ],
                    [
                        'code' => '胭脂粉',
                        'value' => '胭脂粉',
                        'desc' => '胭脂粉',
                        'sort' => 17,
                    ],
                ],
            ],
            [   //产品尺寸
                'group_name' => 'product_size',
                'items' => [
                    [
                        'code' => 'F码',
                        'value' => 'F码',
                        'desc' => 'F码',
                        'sort' => 1,
                    ],
                    [
                        'code' => 'M码',
                        'value' => 'M码',
                        'desc' => 'M码',
                        'sort' => 2,
                    ],
                    [
                        'code' => 'L码',
                        'value' => 'L码',
                        'desc' => 'L码',
                        'sort' => 3,
                    ],
                    [
                        'code' => 'XL码',
                        'value' => 'XL码',
                        'desc' => 'XL码',
                        'sort' => 4,
                    ],
                    [
                        'code' => '2XL码',
                        'value' => '2XL码',
                        'desc' => '2XL码',
                        'sort' => 5,
                    ],
                    [
                        'code' => '3XL码',
                        'value' => '3XL码',
                        'desc' => '3XL码',
                        'sort' => 6,
                    ],
                    [
                        'code' => '4XL码',
                        'value' => '4XL码',
                        'desc' => '4XL码',
                        'sort' => 7,
                    ],
                    [
                        'code' => '5XL码',
                        'value' => '5XL码',
                        'desc' => '5XL码',
                        'sort' => 8,
                    ],
                ],
            ],
            [   //产品样式
                'group_name' => 'product_style',
                'items' => [
                    [
                        'code' => '-',
                        'value' => '-',
                        'desc' => '无',
                        'sort' => 1,
                    ],
                    [
                        'code' => 'V字',
                        'value' => 'V字',
                        'desc' => 'V字',
                        'sort' => 2,
                    ],
                    [
                        'code' => '一字',
                        'value' => '一字',
                        'desc' => '一字',
                        'sort' => 3,
                    ],
                ],
            ],
        ];
        foreach ($info as $key => $val) {
            $group_name = $val['group_name'];
            $items = $val['items'];
            foreach ($items as $item) {
                $dict = Dict::create(
                    [
                        'group' => $group_name,
                        'code' => $item['code'],
                        'value' => $item['value'],
                        'desc' => $item['desc'],
                        'sort' => $item['sort'],
                    ]
                );
            }

        }
    }
}
