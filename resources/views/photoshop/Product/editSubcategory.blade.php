
@extends('layout.photo_navi')


@section('title', 'Edit Sub Category')

@section('distinct_head')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="<?=URL::to('/');?>/cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

@endsection

@section('body_class', 'header-light sidebar-dark sidebar-expandheader-light sidebar-dark sidebar-expand')

@section('content')
<main class="main-wrapper clearfix">
  <!-- Page Title Area -->
  <div class="row page-title clearfix">
    
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
  					<div class="widget-heading clearfix">
  						<h5 class="border-b-light-1 pb-1 mb-2 mt-0 w-100">Edit Sub Category</h5>
						
  					</div>
  					<div class="widget-body clearfix dataTable-length-top-0">
                      <form method='post' action='{{route ('add_subcategory')}}'>
                            <input type="hidden" name="id" value="{{$data->id}}"/>
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username">Sub Category Name</label>
                                    <input class="form-control" value="{{$data->subcatname}}" type="text" id="subcategory" name="subcategory"  placeholder="Sub Category Name">
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress">Main Category name</label>
                                    <select class="form-control" name="maincategory">
                                      <option value="{{$data->getMaincategory->entity_id}}">{{$data->getMaincategory->name}}</option>
                                     @foreach ($list as $item)
                                    <option value="{{$item->entity_id}}">{{$item->name}}</option>
                                      @endforeach
                                    
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary " type="submit">Save</button>
                                </div>
                            
                          </form>
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

@endsection