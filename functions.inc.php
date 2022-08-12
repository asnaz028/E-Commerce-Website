<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_product($con,$limit='',$cat_id='',$product_id='',$search_str='',$sort_order=''){
	$sql="select products.*,categories.categories from products,categories where products.status=1 ";
	if($cat_id!=''){
		$sql.=" and products.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and products.product_id=$product_id ";
	}
	
	$sql.=" and products.categories_id=categories.id ";
	if($search_str!=''){
		$sql.=" and (products.product_name like '%$search_str%' or products.brand like '%$search_str%') ";
	}
	if($sort_order!=''){
		$sql.=$sort_order;
	}else{
		$sql.=" order by products.product_id desc ";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	//echo $sql;
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}


?>