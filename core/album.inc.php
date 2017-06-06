<?php

	function addAlbum($arr){
		insert("imooc_album",$arr);
	}
	/**
	 * 根据商品ID得到商品图片
	 * @param unknown $id
	 * @return Ambigous <multitype:, multitype:>
	 */
	function getProImgById($id){
		$sql="select albumPath from imooc_album where pid={$id} limit 1";
		$row=fetchOne($sql);
		return $row;
	}
	/**
	 * 根据所有得到所有的图片
	 * @param unknown $id
	 * @return Ambigous <multitype:, multitype:>
	 */
	function getProImgsById($id){
		$sql="select albumPath from imooc_album where pid={$id}";
		$rows=fetchAll($sql);
		return $rows;
	}
	
	function doWaterText($id){
		$rows=getProImgsById($id);
		foreach($rows as $row){
			$filename="../image_800/".$row['albumPath'];
			waterText($filename);
		}
		$mes="操作成功";
		return $mes;
	}
	
	function doWaterPic($id){
		$rows=getProImgsById($id);
		foreach($rows as $row){
			$filename="../image_800/".$row['albumPath'];
			waterPic($filename);
		}
		$mes="操作成功";
		return $mes;
	}
						
	
	