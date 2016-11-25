<?php
class AsyncOperation{

    public function test()
    {
        $list = [
            0 =>[
                "id" => 1,
                "tiele" => "title",
                "content" => "8",
            ],
            1 =>[
                "id" => 1,
                "tiele" => "title",
                "content" => "9",
            ],
            2 =>[
                "id" => 1,
                "tiele" => "title",
                "content" => "7",
            ]

        ];
        foreach($list as $key=>$value){
            $newArr[$key] = $value['content'];
        }

        //排序
        array_multisort($newArr,SORT_ASC, $list);
        return $list;
    }

    /*public function test2()
    {
        server('cache')->set('a','nsc');
        return server('cache')->get('a');
    }*/
}
$thread = new AsyncOperation("World");
print_r($thread->test());


