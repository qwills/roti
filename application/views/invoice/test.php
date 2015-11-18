<script type="text/javascript">
	$(document).ready(function(){
		$("#item").click(function(){
			alert($("#item option:selected").next());
		});
	});
</script>
<?php 
	// echo $res['0']['item_price2'];
	function item_drop(array $res){
		echo '<select id="item">';
		$many = count($res);
		for ($i=0 ; $i < $many ; $i++ ) { 
			echo '<option value="'.$i.'">'.$res[$i]['item_name']."</option>".
			'<label >'.$res[$i]['item_price1'].'</label>'.
			'\n<br>';
		}
		echo "</select>";
	}

	function price_drop($res){
		$many = count($res);
		for ($i=0 ; $i < $many ; $i++ ) { 
			echo '<div value="'.$i.'">'.$res[$i]['item_name']."</div>".
			'<label >'.$res[$i]['item_price1'].'</label>'.
			'<br>';
		}
	} 
	item_drop($res);
	price_drop($res);

?>
