<?php

include ('Conexion.php');

$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST')
{
	$requestBody = file_get_contents('php://input');
	$params = json_decode($requestBody);


	$params = (array) $params;
	if($params['UserName'] && $params['address'] && $params['email'] && $params['UserPhone'] && $params['UserDNI'])
	{
		$data =
		[
			'UserName' => $params['UserName'],
			'address' => $params['address'],
			'email' => $params['email'],
			'UserPhone' => $params['UserPhone'],
			'UserDNI' => $params['UserDNI']

		];

		$sql = "INSERT INTO cliente(UserName, address, email, UserPhone, UserDNI) VALUES (:UserName, :address, :email, :UserPhone, :UserDNI)";

		$stmt = $Conexion->prepare($sql);
		$stmt ->execute($data);
		$last_id = $Conexion ->lastInsertId();

	}

	if($last_id)
	{
		echo 'sus datos han sido guardados, espera noticas nuestras';

	}
	else
	{
		echo 'error al guardar tus datos, intenta mas tarde';
	}


}
else
{

	echo "Method not allowed";
}

?>
