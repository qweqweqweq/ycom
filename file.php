<?php
	// 创建日志写入
	$data = var_dump($GLOBALS['']);
	echo $data;
	$data = var_export($GLOBALS['HTTP_RAW_POST_ADTA']); 
	echo $data;
	// echo var_export($GLOBALS);
	// file_put_contents("log.txt", var_export($GLOBALS)."\n", FILE_APPEND);
?>