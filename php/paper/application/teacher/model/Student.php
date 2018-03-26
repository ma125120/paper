<?php

namespace app\teacher\model;

use think\Model;
use traits\model\SoftDelete;

class Student extends Model
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['password','delete_time','update_time'];

    public static function del() {
        $id = input("get.id");
        $student = Student::get($id);
        $result = $student->delete();
        if($result>0) {
            return [
                'msg'=>'删除成功',
                'errCode'=> 0
            ];
        } else {
            return [
                'msg'=>'删除失败',
                'errCode'=> 10002
            ];
        }
    }
    public static function edit() {
        $params = input("get.");
        $student = Student::get($params['id']);
        $student->username=$params['username'];
        $student->real_name=$params['real_name'];
        $result = $student->save();
        if($result>0) {
            return [
                'msg'=>'更新成功',
                'errCode'=> 0
            ];
        } else {
            return [
                'msg'=>'更新失败',
                'errCode'=> 10002
            ];
        }
    }

    public static function getStudentByPage($page=0,$size=10) {
        $pagingData = self::order('create_time desc')
                ->paginate($size,true,['page'=>$page]);
        return $pagingData;
    }

    public static function saveDatas($datas) {
        try {
            $student = new Student;
            $student->saveAll($datas);
            return [
                'msg'   =>  "成功插入数据",
                'errCode'   =>  0
            ];
        } catch(\Exception $e) {
            return [
                'msg'   =>  "包含有重复的数据，请检查",
                'errCode'   =>  10001
            ];
        }
    }
}