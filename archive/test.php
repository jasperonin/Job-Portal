<?php

require_once 'database.php';
if(isset($_POST['buttomImport'])) {
    copy($_FILES['jsonFile']['tmp_name'], 'jsonFiles/'.$_FILES['jsonFile']['name']);
    $data = file_get_contents('jsonFiles/'.$_FILES['jsonFile']['name']);
    $products = json_decode($data);
    foreach ($products as $product) {
        $stmt = $conn->prepare('insert into cities(id, name,region_code, province_code,href) values(:id, :name, :region_code,:province_code, :href)');
        $stmt->bindValue('id', $product->id);
        $stmt->bindValue('name', $product->name);
        $stmt->bindValue('region_code', $product->region_code);
        $stmt->bindValue('province_code', $product->province_code);
        $stmt->bindValue('href', $product->href);
        $stmt->execute();
    }
}
?>
<html>
	<head>
		<title>Import JSON File</title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			JSON File <input type="file" name="jsonFile">
			<br>
			<input type="submit" value="Import" name="buttomImport">
		</form>


	</body>
</html>