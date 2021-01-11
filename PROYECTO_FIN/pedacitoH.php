$name = $row['nombre'];
$descripcion = $row['descripcion'];
$price = $row['precio'];
$image = $row['imagen'];	
$existencia= $row['existencia'];
$idP = $row['id'];
//echo $existence;
$_SESSION["exist"]=	$existence;
	
$cartArray = array(
	$descripcion=>array(
	'name'=>$name,
    'ex'=>$existencia,
	'descripcion'=>$descripcion,
    'ids'=>$idP,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);