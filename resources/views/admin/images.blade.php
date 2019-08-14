@extends('admin.master')
@section('content')
<div class="col-lg-12 col-sm-12 col-l1 main-section">
  <h1> Upload Image </h1> 
    <form>
     <input type="hidden" name="_token" value="{{csrf_token()}}">
     <div class="form-control">
     <input type="file" id="file-1" name="file" multiple="" data-overwrite-initial="false" data-min-file-count="2">
     </div>
     <input type="submit" name="">
    </form>
</div>
@endsection
