<?php
/**
 * Description:
 * file name: PostService.php
 * author: vanwhebin
 * create time: 2021-05-02
 */

namespace App\Http\Services;


use App\Models\Post;

class PostService extends BaseService
{
    public function getItems($pageSize = null, $pageNum = null)
    {
        // TODO 获取所有的文章列表
        $pageNum = $pageNum ?? Post::$pageNum;
        $pageSize = $pageSize ?? Post::$pageSize;

        return Post::where('status', Post::ACTIVE)
            ->offset($pageSize * ($pageNum - 1))
            ->limit($pageSize)->get();
    }


}