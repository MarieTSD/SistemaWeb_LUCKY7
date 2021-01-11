$name = $row['nombre'];
$descripcion = $row['descripcion'];
$price = $row['precio'];
$image = $row['imagen'];
$existencia = $row['existencia'];
$idP = $row['id'];
$cartArray = array(
	$descripcion=>array(
	'name'=>$name,
    'ex'=>$existencia,
    'ids'=>$idP,
	'descripcion'=>$descripcion,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);