
@extends('layout.photo_navi')


@section('title', 'Product List')

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
    {{ Breadcrumbs::render('subcategory') }}
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
  			<div class="col-md-12 widget-holder content-area">
  				<div class="widget-bg">
                    <a href="<?=URL::to('Photoshop/Product/subcategory/add');?>"  class="btn btn-primary small-btn-style ripple" style="float:right"><i class="material-icons list-icon fs-24">playlist_add</i> Add New </a>
  				
  					<div class="widget-heading clearfix">
  						<h5 style="float:left" class="border-b-light-1 pb-1 mb-2 mt-0 w-100">Sub Category List</h5>
					</div>
  					<div class="widget-body clearfix dataTable-length-top-0">
						@if(Session::has('msg'))
						<p class="alert alert-info">{{ Session::get('msg') }}</p>
						@endif
	                    <table class="table table-striped table-center word-break mt-0" id="Productlist">
  							<thead>
  								<tr class="bg-primary">
  									<th>id</th>
									  <th>Sub Category Name</th>
									  <th>Main Category Name</th>
									  
  									<th>Action</th>
  								
  								</tr>
  							</thead>
  							<tbody>
					@foreach ($list as $item)
                        
                   
                  					
	                <tr>
		                <td>{{$item->id}}</td>
	                    <td>{{$item->subcatname}}</td>
						<td>{{$item->getMaincategory->name}}</td>
                        <td>
                            <a href="{{ route('subcategory.edit',['id'=>$item->id]) }}" class="color-content  table-action-style"><i class="material-icons md-18">edit</i></a>
                            <a  data-href="{{ route('subcategory.delete',['id'=>$item->id]) }}" style="cursor:pointer;" class="color-content  btn-delete-subcategory table-action-style"><i class="material-icons md-18">delete</i></a>
                        
                        </td>
                    
                        @endforeach
                        </tr>
                        <tfoot>
                       <tr class="bg-primary">
									<th>id</th>
									  <th>Sub Category Name</th>
									  <th>Main Category Name</th>
									  
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
<script type="text/javascript">
	$(document).on('click','.btn-delete-subcategory',function(){
			var deleteUrl = $(this).data('href');
		    swal({
		        title: 'Are you sure?',
		         type: 'info',
				 text:'Delete This Subcategory',
		        showCancelButton: true,
		        confirmButtonText: 'Confirm',
		        confirmButtonClass: 'btn-confirm-all-productexcel btn btn-info'
		        }).then(function(data) {
		        	if (data.value) {
		        		window.location.href = deleteUrl;
		        	}

		    });
		});
	</script>

@endsection