<script >
	$(document).ready(function(){

		/*variables*/
		var toggle = true;

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

		// check function if there is empty input
		$('.btn').click(function(){
			// var $nonempty = $('.form-control').filter(function() {
			// 	return this.value != ''
			// });
			// if ($nonempty.length == 0) {
			// 	alert('customer name can not be empty');
			// }
			
			if($('input').val() == ''){
				alert("Can not be empty");
				return false;
			}
		});

		// delete a customer based on his/her ID
		$('.del').click(function(){
			if(confirm('are you sure want to delete?')){
				var del_id = $(this).attr('name').toLowerCase();
				var posting = $.post('customer/delete', {"cust_id": del_id});
					posting.done(function(data){
						alert(del_id + ' has been deleted!');
				});
			}

		});

		// submit function
		$('#formid').submit(function(event){
			event.preventDefault();
			var cust_name = $('#name').val().toLowerCase();
			var posting = $.post($(this).attr('action'), {"name": cust_name});
			posting.done(function(data){
				alert(cust_name + ' has been added!');
				$('.form-control').val('');
			});

			// $.ajax({
			// 	type: "POST",
			// 	url: $.post($(this).attr('action'),
			// 	data: data,
			// 	success: success,
			// 	dataType: dataType
			// });
		});

	});
</script>

<?=$navbar?>

<div class="container">
	<div class="page-header well">
    	<h1>CUSTOMER</h1>      
	</div>
	<form id="formid" action="customer/check" method="post" role="form">
		<div class="form-group">
            <label for="name">Customer name: </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter customer name">
        </div>
        <button type="submit" class="btn btn-default">Add</button>
	</form>

	<div class="table">
		<?php
			$this->table->set_template(array(
				'table_open' => '<table id="cust_table" class="table">'
			)); 
			$this->table->set_heading('ID', 'Name', 'Status', 'Delete');

			$q = $this->customer_model->show_users();
			foreach ($q->result() as $row)
			{
			    $this->table->add_row($row->cust_id,$row->cust_name,$row->cust_status,'<button class="del" name="'.$row->cust_id.'">Delete</button>');
			}			
			echo $this->table->generate();
		?>
	</div>	
</div>