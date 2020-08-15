<?php
include("lib_db.php");
	if($_REQUEST != "")
   	{
   		$table = isset($_REQUEST['table']) ? $_REQUEST['table'] : "";
   		//echo $table; exit();
   		$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
   		//echo $id; exit();
   		$sqlDelete = data_to_sql_delete($table,$id);
   		//echo $sqlDelete; exit();
   		$delete = exec_delete($sqlDelete);
   		echo "Xóa thành công table:".$table.", id:".$id; //exit();
   	}
?>