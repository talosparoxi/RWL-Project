<?php

include('../database.php');

	$farmId = intval($_GET['q']);
	$query="select warehouse_id, warehouse_name from warehouse where farm_id=".$farmId;
	$result = $db->query($query);
	while($row = $result->fetch_assoc()) {
		$warehouseId = $row['warehouse_id'];
		$warehouseName = $row['warehouse_name'];
		$warehouses[] = array($warehouseId, $warehouseName);

	}

	echo json_encode($warehouses);
?>
