<?php
// 	define("DB_HOST", "localhost");
// 	define("DB_USER", "root");
// 	define("DB_PWD", "ldw612323");
// 	define("DB_DBNAME","shoopimooc");
// 	define("DB_CHARSET", "utf8");

function  connect(){
	$link=mysql_connect("localhost","root","ldw612323") or die("数据库连接失败ERROR：".mysql_errno().":".mysql_error());
	mysql_set_charset("utf8");
	mysql_select_db("shoopimooc") 	or die("指定数据库打开失败");
	return $link;
}
//    require_once '../configs/configs.php';
// require_once '../include.php';
   /**
    * 丽娜姐数据库
    * @return resource
    */
//    function  connect(){
//    	$link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败ERROR：".mysql_errno().":".mysql_error());
//    	mysql_set_charset(DB_CHARSET);
//    	mysql_select_db(DB_DBNAME) 	or die("指定数据库打开失败");
//    	return $link;
//    }
   /**
    * 插入操作
    * @param  $table 表名
    * @param unknown $array 数组
    * @return number
    */
//    function insert($table,$array){
//    	$keys=join(",", array_keys($array));
//    	$vals="'".join("','", array_values($array))."'";
//    	$sql="insert {table}{keys} values({$vals})";
//    	mysql_query($sql);
//    	return mysql_insert_id();
//    }
   function insert($table,$array){
   	$keys=join(",",array_keys($array));
   	$vals="'".join("','",array_values($array))."'";
   	$sql="insert {$table}($keys) values({$vals})";
   	mysql_query($sql);
   	return mysql_insert_id();
   }
//    insert('test', 'main');
//    var_dump($sql);exit();
// connect();
// insert('tste', 'test');

   /**
    * 更新操作
    * @param unknown $table
    * @param unknown $array
    * @param unknown $where
    * @return number|boolean
    */
// function update($table,$array,$where=null){
// 	foreach($array as $key=>$val){
// 		if($str==null){
// 			$sep="";
// 		}else{
// 			$sep=",";
// 		}
// 		$str.=$sep.$key."='".$val."'";
// 	}
// 		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
// 		$result=mysql_query($sql);
// 		//var_dump($result);
// 		//var_dump(mysql_affected_rows());exit;
// 		if($result){
// 			return mysql_affected_rows();
// 		}else{
// 			return false;
// 		}
// }
   function update($table,$array,$where=null){
   	foreach($array as $key=>$val){
   		$str="";
   		if($str==null){
   			$sep="";
   		}else{
   			$sep=",";
   		}
   		$str.=$sep.$key."='".$val."'";
   	}
   	$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
   	$result=mysql_query($sql);
   	//var_dump($result);
   	//var_dump(mysql_affected_rows());exit;
   	if($result){
   		return mysql_affected_rows();
   	}else{
   		return false;
   	}
   }
  /**
   * 删除操作
   * @param unknown $table
   * @param unknown $where
   * @return number
   */
//   function delete($table,$where){
//   	$where=$where==null?null:"where".$where;
//   	$sql="delete from {$table}{$where}";
//   	mysql_query($sql);
//   	return mysql_affected_rows();
//   }
   function delete($table,$where=null){
   	$where=$where==null?null:" where ".$where;
   	$sql="delete from {$table} {$where}";
   	mysql_query($sql);
   	return mysql_affected_rows();
   }
   
/**
 * 得到一条记录
 * @param unknown $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result,$result_type);
	return $row;

}
// function fetchOne($sql){
// 	$result=mysql_query($sql);
// 	$row=mysql_fetch_array($result);
// 	return $row;
// }

/**
 * 得到所有数据
 * @param unknown $sql
 * @param string $result_type
 * @return multitype:
 */
// function fetchAll($sql,$result_type=MYSQL_ASSOC){
// 	$result=mysql_query($sql);
// 	while(@$row=mysql_fetch_array($result,$result_type)){
// 		$rows[]=$row;
// 	}
// 	return $rows;
// }
function fetchAll($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	while(@$row=mysql_fetch_array($result,$result_type)){
		$rows[]=$row;
	}
	return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param unknown $sql
 * @return number
 */
function getResultNum($sql){
	$result=mysql_query($sql);
	return mysql_num_rows($result);
}


/**
 *  得到上一步插入记录的ID号
 * @return number
 */
function getInsertId(){
	return mysql_insert_id();
}
   
   
   
   
   
   