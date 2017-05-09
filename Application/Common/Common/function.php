<?php
/**
 * 返回 json 数据
 * @param  [int] $status    300:失败，200:成功
 * @param  [string] $msg    返回信息
 * @param  [array] $data    其他信息
 * @return [json]
 */
function show($status, $msg, $closeCurrent=false, $data=array()){

    $tmpArr = array(
        'statusCode' => $status,
        'message'    => $msg,
        'closeCurrent' => $closeCurrent,
    );
    $tmpArr = array_merge($tmpArr, $data);
    exit(json_encode($tmpArr));
}

//读取EXCEL
function readExcel($filename,$encode='utf-8')
{
    import("Org/Util/PHPExcel");
    if( strpos($filename , "xlsx") ){
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    }
    else{
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
    }
    $objReader->setReadDataOnly(true);

    $objPHPExcel = $objReader->load($filename);


    $objWorksheet = $objPHPExcel->getActiveSheet();
    $highestRow = $objWorksheet->getHighestRow();
    $highestColumn = $objWorksheet->getHighestColumn();

    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $excelData = array();
    for ($row = 1; $row<= $highestRow;$row++){
        if((string)$objWorksheet->getCellByColumnAndRow( 0 , $row )->getValue() == "") continue;
        for ( $col = 0; $col < $highestColumnIndex ; $col++) {
            $value =  (string)$objWorksheet->getCellByColumnAndRow( $col , 1 )->getValue();
            if($value == ""){
                continue;
            }
            $excelData[$row-1][] = (string)$objWorksheet->getCellByColumnAndRow($col,$row)->getValue();
        }
    }
    return $excelData;
}
