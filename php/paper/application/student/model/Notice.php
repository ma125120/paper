<?php

namespace app\teacher\model;

use think\Model;
use traits\model\SoftDelete;

class Notice extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['password','delete_time','update_time'];

    public static function upload() {
        $form = request()->param();
        $data = [
            'title' =>  $form['title'],
            'content' =>  $form['content'],
            'upload_user' =>  $form['upload_user']
        ];
        $notice = new Notice($data);
        $result = $notice->save();
        return self::returnMsg($result);
    }
}