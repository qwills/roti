<script >
	$(document).ready(function(){
		/*variables*/
		var toggle = true;

		// submit function
		$('#formid').submit(function(event){
			var $nonempty = $('.required').filter(function(){
				return this.value != '';
			});

			if($nonempty.length < 2){
				alert("required field(s) can not be empty");
				return false;
			}

			event.preventDefault();
			var item_name = $('#item_name').val().toLowerCase();
			var item_price1 = $('#item_price1').val();
			var item_price2 = $('#item_price2').val();

			var posting = $.post($(this).attr('action'), {
				"item_name": item_name,
				"item_price1": item_price1,
				"item_price2": item_price2
			});
			posting.done(function(data){
				alert(item_name + ' has been added!');
				$('.form-control').val('');
			});
		});

		// delete an item based on its name
		$('.del').click(function(){
			if(confirm('are you sure want to delete?')){
				var item_name = $(this).attr('name').toLowerCase();
				var posting = $.post('item/delete', {"item_name": item_name});
				posting.done(function(data){
					alert(item_name + ' has been deleted!');
				});
			}

		});

		// toggle function
		$('h1').click(function(){
			if(toggle){
				$('#formid').hide();
				toggle=false;
			} else {
				$('#formid').show();
				toggle=true;
			}
		});

	});
</script>

<?=$navbar?>

<div class="container">
	<div class="page-header well">
    	<h1>ITEM</h1>      
	</div>
	<form id="formid" role="form" method="post" action="item/add">
		<label class="info" >* is required</label>
		<div class="form-group">
			<label class="control-label" for="item_name">Name: *</label>
			<input type="text" class="form-control required" name="item_name" id="item_name" placeholder="Enter item name">
		</div>
		<div class="form-group">
			<label class="control-label" for="item_price1">Price 1: *</label>
			<input type="number" class="form-control required" name="item_price1" id="item_price1" placeholder="Enter item price">
			
		</div>
		<div class="form-group">
			<label class="control-label" for="item_price2">Price 2:</label>
			<input type="number" class="form-control" name="item_price2" id="item_price2" placeholder="Enter item price <not necessary>">
		</div>
		<button type="submit" class="btn btn-default">Add</button>
	</form>
	<div class="row">
		<div class="result">
			<?php
				$this->table->set_template(array(
					'table_open' => '<table id="cust_table" class="table">'
				)); 
				$this->table->set_heading('Name', 'Price', 'Optional Price','Edit','Delete');

				$q = $this->item_model->show_items();
				foreach ($q->result() as $row)
				{
				    $this->table->add_row(
				    	$row->item_name,
				    	"Rp. ".number_format($row->item_price1),
				    	"Rp. ".number_format($row->item_price2),
				    	'<a class="btn btn-default edit"  href="item/edit/'.$row->item_name.'">Edit</a>',
				    	'<button class="del" name="'.$row->item_name.'">Delete</button>');
				}			
				echo $this->table->generate();
			?>
		</div>
	</div>
</div>