@extends('layout.photo_navi')


@section('title', 'Editing Done')

@section('distinct_head')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="<?=URL::to('/');?>/cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

@endsection
<style>
    table, td, th {
      
       width: 300px;
    }
 </style>
@section('body_class', 'header-light sidebar-dark sidebar-expandheader-light sidebar-dark sidebar-expand')

@section('content')
<main class="main-wrapper clearfix">
  <!-- Page Title Area -->
  <div class="row page-title clearfix">
    {{ Breadcrumbs::render('editing.done') }}
      <!-- /.page-title-right -->
  </div>
  <!-- /.page-title -->
  <!-- =================================== -->
  <!-- Different data widgets ============ -->
  <!-- =================================== -->
  <div class="col-md-12 widget-holder loader-area" style="display: none;">
    <div class="widget-bg text-center">
      <div class="loader"></div>
    </div>
  </div>
  	<div class="widget-list">
		<div class="row">
			<div class="col-md-12 widget-holder">
			  <div class="widget-bg">
				<div class="widget-body clearfix">
				  <h5 class="box-title">Placement Done Filter</h5>
				  <div class="tabs">
					<ul class="nav nav-tabs">
					 
					  <li class="nav-item active"><a class="nav-link" href="#profile-tab" data-toggle="tab" aria-expanded="true">Filter</a>
					  </li>
					  <li class="nav-item "><a class="nav-link" href="#changestatus" data-toggle="tab" aria-expanded="true">Change Status</a>
					  </li>
					</ul>
					
				  
					<!-- /.nav-tabs -->
					<div class="tab-content">
				
					  <div class="tab-pane  active" id="profile-tab">
						<div class="col-md-12 widget-holder content-area">
						  <div class="widget-bg">
							<div class="widget-heading clearfix">
							  <h5 class="border-b-light-1 pb-1 mb-2 mt-0 w-100">Filter</h5>
							  
							</div>
							<div class="widget-body clearfix dataTable-length-top-0">
							  
								<div class="row">
								  <div class="col-md-3">
									<div class="form-group">
									  <select class="form-control" name="category" id="category">
										<option value="">Select Category</option>
										@foreach ($category as $item)
									  <option value="{{$item->entity_id}}">{{$item->name}}</option>
										@endforeach
									  </select>	
									</div>
								  </div>
								  <div class="col-md-3">
									<div class="form-group">
									  <select class="form-control" disabled name="color" id="color">
										<option value="">Select Color</option>
										
									  </select>	
									</div>
								  </div>
								 
								  <div class="col-md-3">
									<div class="form-group">
									  <input class="form-control" id="sku" name="sku" style="height: 43px;" placeholder="Sku Search" type="text">
									</div>
								  </div>
								  <div class="col-md-3">
									<div class="form-group">
									  <input class="btn btn-primary" style="height: 43px;" id="searchfilter"   type="submit" value="Apply">
									  <input class="btn btn-success" style="height: 43px;" id="reset"   type="submit" value="Reset">
									
									</div>
								  </div>
								</div>
							  
				  
				  
							</div>
						  </div>
						</div>	</div>
						<div class="tab-pane" id="changestatus">
						  <div class="widget-list">
							<div class="row">
							  <!-- Counter: Sales -->
							  <div class="col-md-2 col-sm-6 widget-holder widget-full-height">
							   
							  </div>
							  <div class="col-md-6 col-sm-6 widget-holder widget-full-height">
								<form action="javascript:void(0)" method="post">
								  <div style="float:left">
								  <select style="float:left;width: 506px;" id="bulk_status_change_status" class="form-control" name="status">
									<option value="0">Select Status</option>
									<option value="4">Rework</option>
								 </select>
								</div>
								<div style="float:left">
							  
								  <input type="submit" id="bulk_status_change" style="float:left;margin-left:30px" value="submit" class="btn btn-primary"/>
								</div>
								</form>
								
							  </div>
							 
							</div>
							<!-- /.row -->
						
						  </div>
						</div>
					  
					</div>
					<!-- /.tab-content -->
				  </div>
				  <!-- /.tabs -->
				</div>
				<!-- /.widget-body -->
			  </div>
			  <!-- /.widget-bg -->
			</div>
		
		  </div>
	
      
      
      	<div class="row">
  			<div class="col-md-12 widget-holder content-area">
  				<div class="widget-bg">
  					<div class="widget-heading clearfix">
  						<h5 class="border-b-light-1 pb-1 mb-2 mt-0 w-100">Product List</h5>
						
  					</div>
  					<div class="widget-body clearfix dataTable-length-top-0">
  						
	                    <table class="table table-striped table-center word-break mt-0"   id="editingdonelisr">
							<thead>
								<tr class="bg-primary">
									<th class="checkboxth">
										<div class="checkbox checkbox-primary" style="width: 100px;">
											<label>
												<input type="checkbox" id="chkAllProduct"> <span class="label-text"></span>
											</label>
										</div>
									  </th>
									<th>Sku</th>
									<th>Color</th>
									<th>Category</th>
								
									<th>Action</th>
								
								</tr>
							</thead>
							<tbody>
	  
								@foreach ($done_list as $item)
								<?php 
								$product=$item->getProduct;
								$category=$item->category;
								?>
							
							<tr>
								<td>
								<div class="checkbox checkbox-primary" style="width: 100px;">
									<label >
									<input type="checkbox" value="{{$item->product_id}}" class="chkProduct" name="chkProduct" id="chkProduct"> <span class="label-text"></span>
									</label>
								</div>
								</td>
								<td>{{$product->sku}}</td>
								<td>{{$product->color}}
								</td>
							<td>{{$category->name}}</td>
						
								<td style="    float: right;">
									<form action="" method="POST">
										<input type="hidden" name="product_id" value="{{$item->product_id}}"/>
										<input type="hidden" name="category_id" value="{{$item->category_id}}"/>
							
										@csrf
										<select name="status" class="form-control" style="height:20px;width:150px;float: left;">
											<option value="0">select status</option>
											<option value="4">Rework</option>
										</select>
										<input type="submit" style="height: 20px;
										float: left;
										margin-left: 6px;" class="btn btn-primary" value="Submit"/>
								
									</form>
									</td>
							
							
							</tr>
						
															
															@endforeach
						
														  
													
								  
							  
							</tbody>
							<tfoot>
							  <tr class="bg-primary">
								  <th></th>
								  <th>Sku</th>
								  <th>Color</th>
								  <th>Category</th>
								  
								  <th>Action</th>
							  
							  </tr>
						  </tfoot>
						</table>
  					</div>
  				</div>
  			</div>
  		</div>
    </div>
  <!-- /.widget-list -->
</main>
<!-- /.main-wrappper -->
<input type="hidden" id="editingdonelist" value="{{route('get_ajax_list_editing_done')}}">
<style type="text/css">
.form-control[readonly] {background-color: #fff;}
</style>
@endsection

@section('distinct_footer_script')
<script src="<?=URL::to('/');?>/cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="<?=URL::to('/');?>/js/jquery.validate.min.js"></script>
<script src="<?=URL::to('/');?>/js/additional-methods.min.js"></script>
<script>
var buttonCommon = {
	exportOptions: {
		format: {
			body: function ( data, row, column, node ) {                    
				if (column === 3) {
				  data = data.replace(/(&nbsp;|<([^>]+)>)/ig, "");
				}
				return data;
			}
		}
	}
};
var table=$('#editingdonelisr').dataTable({
	"dom": "<'row mb-2 align-items-center'<'col-auto dataTable-length-tb-0'l><'col'B>><'row'<'col-md-12' <'user-roles-main' t>>><'row'<'col-md-3'i><'col-md-6 ml-auto'p>>",
  "lengthMenu": [[10, 50, 100, 200,500], [10, 50, 100, 200,500]],
  "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 0] }, 
       
    ],
  "buttons": [
	$.extend( true, {}, buttonCommon, {
      extend: 'csv',
      footer: false,
      title: 'Editing-done-product-list',
      className: "btn btn-primary btn-sm px-3",
      exportOptions: {
          columns: [0,1,2,3],
          orthogonal: 'export'
      }
    }),
	$.extend( true, {}, buttonCommon, {
      extend: 'excel',
      footer: false,
      title: 'Editing-done-product-list',
      className: "btn btn-primary btn-sm px-3",
      exportOptions: {
          columns: [0,1,2,3],
          orthogonal: 'export'
      }
    })
  ],
  "language": {
    "search": "",
    "infoEmpty": "No matched records found",
    "zeroRecords": "No matched records found",
    "emptyTable": "No data available in table",
    /*"sProcessing": "<div class='spinner-border' style='width: 3rem; height: 3rem;'' role='status'><span class='sr-only'>Loading...</span></div>"*/
  },
  "order": [[ 0, "desc" ]],
 
  "deferLoading": <?=$done_list->count()?>,
  "processing": true,
  "serverSide": true,
  "searching": false,
  "serverMethod": "post",
  "ajax":{
	"url": $("#editingdonelist").val(),
	"data": function(data, callback){
		data._token = "{{ csrf_token() }}";
	    console.log(data);
        showLoader();
	
	},
	complete: function(response){
      hideLoader();
	}

  }
});
$("#chkAllProduct").click(function(){
    $('.chkProduct').prop('checked', this.checked);
});
</script>
@endsection