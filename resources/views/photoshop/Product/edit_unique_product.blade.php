

@extends('layout.photo_navi')


@section('title', 'Edit Unique Product')

@section('distinct_head')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="<?=URL::to('/');?>/cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

@endsection

@section('body_class', 'header-light sidebar-dark sidebar-expandheader-light sidebar-dark sidebar-expand')

@section('content')
<main class="main-wrapper clearfix">
  <!-- Page Title Area -->
  <div class="row page-title clearfix">
   ccds    <!-- /.page-title-right -->
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
  						<h5 class="border-b-light-1 pb-1 mb-2 mt-0 w-100">Edit Unique Product </h5>
						
  					</div>
  					<div class="widget-body clearfix dataTable-length-top-0 col-md-6">
                      <form method='post' action="{{route('unique.product.update')}}">
                            {{ csrf_field() }}
                            <input class="form-control" value="{{$data->id}}"  type="hidden" name="id" >
                            <input class="form-control" value="{{$data->product_id}}"  type="hidden" name="product_id" >
                          
                            <div class="form-group">
                                <label for="username">Sku</label>
                            <input class="form-control" value="{{$data->sku}}" readonly type="text" name="sku">
                            </div>
                            <div class="form-group">
                                <label for="username">Sku Name</label>
                            <input class="form-control" value="{{$data->skuname}}"  type="text" name="skuname">
                            </div>
                            <div class="form-group">
                                <label for="username">Sub Category</label>
                            <select class="form-control" name="subcaegory">
                                <option value="{{$data->getsubcategory->id}}">{{$data->getsubcategory->subcatname}}</option>
                                @foreach ($subcat as $item)
                                <option value="{{$item->id}}">{{$item->subcatname}}</option>
                                  
                                @endforeach
                            </select>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Update">
                          
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