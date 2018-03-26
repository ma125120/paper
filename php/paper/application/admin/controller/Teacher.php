<?php
namespace app\admin\controller;

use think\Exception;
use think\Env;
use app\api\validate\LoginInfo;
use app\lib\model\Admin;
use app\admin\model\Teacher as TeacherModel;
use think\Db;

class Teacher extends BaseController
{
		protected $beforeActionList = [
        //'checkExclusiveScope' =>  ['only'=>'edit,delete,upload,getInfoByPage'],
        'checkPrimaryScope' =>  ['only'=>'edit,delete,upload,getInfoByPage']
    ];
		public function edit() {
        return TeacherModel::edit();
    }
    public function delete() {
        return TeacherModel::del();
    }

		public function getInfoByPage($page=0,$size=10) {
        $data = TeacherModel::getTeacherByPage($page,$size);
        return $data->toArray()['data'];
    }

    public function upload()
    {
    		vendor("PHPExcel.PHPExcel");
        $file = request()->file('file');
        $info = $file->validate(['size'=>55678,'ext'=>'xlsx,xls,csv'])->move(ROOT_PATH . 'public' . DS . 'excel');
        if($info){  
            $exclePath = $info->getSaveName();
            $file_name = ROOT_PATH . 'public' . DS . 'excel' . DS . $exclePath;
            $objReader =\PHPExcel_IOFactory::createReader('Excel2007'); 
            $PHPExcel =$objReader->load($file_name, $encode = 'utf-8');
            //将数据转换为数组
            $datas = Teacher::getDataFromExcel($PHPExcel);

            $result = TeacherModel::saveDatas($datas);

            return $result;    
        }else{   
            echo $file->getError();  
        }
    }

    public static function getDataFromExcel($PHPExcel) {
    	$datas = array();
    	$sheetCount = $PHPExcel->getSheetCount();
    	for($i = 0 ; $i < $sheetCount ; $i++) {
    		$sheet = $PHPExcel->getSheet($i);
    		$rows = $sheet->getHighestRow();
    		for($row = 2;$row <= $rows; $row++) {
    			$username = $sheet->getCell('A'.$row)->getValue();
    			$real_name = $sheet->getCell('B'.$row)->getValue();
    			if(!empty($username) && !empty($real_name)) {
    				array_push($datas, [
	    				'username'	=>	$username,
	    				'real_name'	=>	$real_name
	    			]);
    			}
    		}
    	}

    	return $datas;
    }
    

}