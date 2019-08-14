@if(Auth::check())

<!DOCTYPE html>
<html>
<head>
	
	<title></title>

	<link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
  	<link href="{{ asset('css/webflow.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/create.css') }}" rel="stylesheet" type="text/css">
  	<link href="{{ asset('css/kairzhans-cool-project.webflow.css') }}" rel="stylesheet" type="text/css">

  	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('css/preview.css') }}" rel="stylesheet">
	<meta charset="utf-8">
	<link href="{{asset('css/font-face.css')}}" rel="stylesheet" media="all">
	<link href="{{url('css/theme.css')}}" rel="stylesheet" media="all">
  
	<link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
	
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
   	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
   	<style type="text/css">
   		.noone{
   			display: none;
   		}
   		.not-noone{
   			display: block;
   		}
   		#category{
   			margin-left: -10px;
   			
   			padding: 10px;
   		}
   		.category_list:hover{
   			display: block;
   		}
      .width-100{
        width: 100%;
      }
      .fileinput-remove,
      .fileinput-upload{

          display: none;

      }
   	</style>
</head>
<body>
	<main>
		<div class="container">
			@yield('content')

		</div>


		<script src="{{url('vendor/jquery-3.2.1.min.js')}}"></script>

	    
	</main>
	
	<script>
	    document.getElementById('button').onclick = function() {
	       alert("button was clicked");
	    }​;​
	</script>
	<script src="{{ asset('js/webflow.js')}}" type="text/javascript"></script>
	<script src="{{url('js/main.js')}}"></script>
	<script src="{{url('js/custom.js')}}"></script>
    <script src="{{url('vendor/bootstrap-4.1/popper.min.js')}}"></script>
	<script src="{{url('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>



	<script type="text/javascript">
		$('.popover-dismiss').popover({
		  trigger: 'focus'
		});
    $(document).ready(function(){
     $('#file-1').fileinput({
      theme:'fa',
      uploadExtraData:function(){
       return{
        _token:$("input[name='_token']").val()
       };
      },
      allowedFileExtensions:['jpg','png','jpeg','gif'],
      overwriteInitial:false,
      maxFileSize:10000,
      maxFileNum:8,
      slugCallback:function(filename){
       return filename.replace('(','_').replace(']','_');
      }
     });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
     $('#file-2').fileinput({
      theme:'fa',
      uploadExtraData:function(){
       return{
        _token:$("input[name='_token']").val()
       };
      },
      allowedFileExtensions:['mp3','mp4','jpeg','gif'],
      overwriteInitial:false,
      maxFileSize:10000,
      maxFileNum:8,
      slugCallback:function(filename){
       return filename.replace('(','_').replace(']','_');
      }
     });
    });
  </script>
<script>
  var figure = $(".video").hover( hoverVideo, hideVideo );

  function hoverVideo(e) {  
      $('video', this).get(0).play(); 
  }

  function hideVideo(e) {
      $('video', this).get(0).pause(); 
  }

</script>

</body>
</html>
@else
	<h1>FUCK OUT HERE!</h1>
@endif