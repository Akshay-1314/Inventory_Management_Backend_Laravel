<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap CSS-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<style>
		body{
			margin:1%;
		}

		.invoice-box {
        	width: 70%;
        	padding:2%;
        	margin:0 auto;
        	border: 1px solid #eeeeee;
        	box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        	font-family: Helvetica, Arial,sans-serif;
          }

        @media print{
        	#PrintInvoice{
        		display:none;
        	}
        }
	</style>

	<title>Invoice</title>

</head>

<body>
	<h2 class="text-center">INVOICE</h2>
	<br>
	<div class="invoice-box">

    @if(!session('store_name') && !session('store_details'))
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mx-auto text-info" id="exampleModalLabel">Store Details</h5>
        </div>
        <form  action="store_details" method="POST" id="store_details">
         @csrf
            <div class="modal-body">
                <div class="text-center col">
                    Store Name:
                </div>
                <input type="text" name="store_name" minlength="3" placeholder="Enter store name" class="form-control" required><br>
                <div class="text-center col">
                    Store Address:
                </div>
                <textarea class="form-control" placeholder="Enter address" name="address" rows="4"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning quantity_confirm btn-block">Submit</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- End of Modal -->
    @endif

		<!-- Store Details -->
		<div class="row justify-content-between">
			<div class="col-6">
            @if(session('store_name'))
            <h4>{{session('store_name')}}</h4>
            @else
            <h4>Store Name</h4>
            @endif
        
			@if(session('store_details'))
            <h5>{{session('store_details')}}</h5>
            @else
			<h5>Store Details</h5>
            @endif
			</div>

			@if(session('seller'))
			<div class="col-4 align-self-center">
				Date: {{$date}}
			</div>
			@endif
		</div>

		<hr>

		<!-- Customer Details -->
		<div class="row">
			<div class="col-7">
				Customer Name: {{$customer_name}}
			</div>
			@if(session('seller'))
			<div class="col-5">
				Mobile Number: {{$customer_mobile}}
			</div>
			@endif
		</div>

		<hr>

		<!-- Products -->
		<table class="table table-responsive-sm">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Amount</th>
					@if(!session('seller'))
					<th>Date of Transaction</th>
					@endif
				</tr>
			</thead>

			<tbody>
                @foreach($details as $value)
				<tr>
					<td>{{$value->product_name}}</td>
                    <td>{{$value->selling_price}}</td>
					@if(session('seller'))
                    <td>{{$value->quantity_sold}}</td>
                    <td>{{$value->quantity_sold*$value->selling_price}}</td>
					@else
					<td>{{$value->quantity}}</td>
					<td>{{$value->quantity*$value->selling_price}}</td>
					<td>{{$value->date_of_transaction}}</td>
					@endif
				</tr>
                @endforeach
			</tbody>
		</table>

		<hr>

		<!-- Total Amount -->
		<div class="row justify-content-around">
			 <div class="col-4">
			 	Number of Items: {{$count}}
			 </div>
			 <div class="col-4">
                Total Quantity: {{$quantity_sold}}<br>
			 	Total Amount: {{$amount}}
			 	<br>
			 </div>
		</div>

		<br>

		<p class="text-center">Thank You! Visit Again!</p>

		<button type="button" id="PrintInvoice" class="btn btn-primary" onclick="window.print()">Print Invoice</button>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $("#exampleModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    </script>
</body>
</html>