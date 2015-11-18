<script type="text/javascript">
	$(document).ready(function(){
		$('#formid').submit(function(event){
			var i_1 = $('#item_price1').val();
			var i_2 = $('#item_price2').val();
			var i_name = $('#i_name').text();

			if(i_1 == ""){
				alert("Price 1 can not be empty.");
				return false;
			} else if (i_1 < 0){
				alert("Price 1 can not be less than 0.");
				return false;
			} else if (i_2 == "") {
				event.preventDefault();
				var posting = $.post($(this).attr('action'), {
					"item_name": i_name,
					"item_price1": i_1,
					"item_price2": i_2
				});
				posting.done(function(data){
					alert("change has been made.");
					window.location.href = "/item";
				});
			} else if (i_2 < 0){
				alert("Price 2 can not be less than 0.");
				return false;
			} else {
				event.preventDefault();
				var posting = $.post($(this).attr('action'), {
					"item_name": i_name,
					"item_price1": i_1,
					"item_price2": i_2
				});
				posting.done(function(data){
					alert("change has been made.");
					window.location.href = "/item";
				});
			}
			return false;
		});
	});
</script>

<?=$navbar?>

<div class="container">
	<form id="formid" role="form" method="post" action="/item/change">
		<label class="info" >Current</label>
		<div class="form-group">
			<h2><label id="i_name"><?php echo $clean;?></label></h2><br>
			<label class="control-label" id="cur_price1" for="item_price1">Price1: <?php echo "Rp. ".number_format($result->item_price1);?></label><br>
			<label class="control-label" id="cur_price2" for="item_price2">Price2: <?php echo "Rp. ".number_format($result->item_price2);?></label><br>
		</div>
		<label class="info" >Change to: </label>
		<div class="form-group">
			<label class="control-label" for="item_price1">Price 1: *</label>
			<input type="number" class="form-control required" name="item_price1" id="item_price1" placeholder="Enter item price">
			<label class="control-label" for="item_price2">Price 2:</label>
			<input type="number" class="form-control" name="item_price2" id="item_price2" placeholder="Enter item price <not necessary>">
		</div>
		<?php echo anchor('item','Back to Item menu'); ?>
		<button type="submit" class="btn btn-default">Change</button>
	</form>
</div>