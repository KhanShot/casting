
<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/webflow.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/create.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/sliderstyle.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/kairzhans-cool-project.webflow.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
  <link href="{{ asset('css/preview.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-face.css')}}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
  <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
  
  <link href="{{ url('css/theme.css')}}" rel="stylesheet" media="all">
  <link href="{{ url('css/project.css')}}" rel="stylesheet" media="all">
  <link href="{{ url('css/js-image-slider.css')}}" rel="stylesheet" media="all">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

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
      
      .fileinput-upload{

          display: none;

      }
      .file-drop-zone{
        height: auto;
      }
 
  
   	</style>
</head>
<body>
	<main>
		<div class="container">
			@yield('content')
      <p>
       
		</div>



	    
	</main>
	 
   
  <script src="{{ asset('js/webflow.js')}}" type="text/javascript"></script>
  <script src="{{url('js/main.js')}}"></script>
  <script src="{{url('js/custom.js')}}"></script>
  <script src="{{url('vendor/bootstrap-4.1/popper.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
  <script src="{{url('js/js-image-slider.js')}}"></script>
  <script type="text/javascript" src="{{url('js/jssor.slider.min.js')}}"></script>
  <script type="text/javascript" src="{{url('js/slidersricpt.js')}}"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.2/js/fileinput.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>



<script>
  $('#myCollapsible').collapse({
    toggle: true
  })
  $('.popover-dismiss').popover({
    trigger: 'focus'
  })
    $("#checkbox").change(function(){

      var check = $('#checkbox');
      var val = $('#is_admin').val() ;
      if($("#checkbox").prop('checked') == true){
            $('#is_admin').val('1');
            val = $('#is_admin').val();
        }
      if($("#checkbox").prop('checked') == false){
            $('#is_admin').val('0');
            val = $('#is_admin').val();
        }
      $('#textinp').html(val);
      
    });
  
</script>

	<script type="text/javascript">
		
    $(document).ready(function(){
      $("#input-1").fileinput({
          allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
          
      });
      $("#input-2").fileinput({
          allowedFileExtensions: ["MP4", "AVI", "MOV", "mov"]
      });
    });
  </script>
<script type="text/javascript">
  $(document).ready(function(){
        // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        var a = $("#vk").val();
        var b = $('#inst').val();
        var c = $('#ano').val();
        
        $("#myBtn").val($("#vk").val()+','+$('#inst').val()+','+$('#ano').val());
      }
    }

      
    
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
<script type="text/javascript">
 $(document).ready(function(){
    $("#checkbox").change(function(){
      var check = $('#checkbox');
      var val = $('#is_admin').val() ;
      if($("#checkbox").prop('checked') == true){
            $('#is_admin').val('1');
            val = $('#is_admin').val();
        }
      if($("#checkbox").prop('checked') == false){
            $('#is_admin').val('0');
            val = $('#is_admin').val();
        }
      $('#textinp').html(val);
      
    });

    

    var inp1 = $("#input-1").val();
    var inp2 = $("#input-2").val();
    var inp3 = $("#input-3").val();
  

    $('#input-5').rating({showClear:false});
    $("#input-1").rating().on("change", function(event, value, caption) {
        var input1 = $('#input-1').val();
        $('#inp1').val(input1);
        $('#inp2').val(inp2);
        $('#inp3').val(inp3);

        $("#input-2").val(inp2);
        $("#input-3").val(inp3);
        $.confirm({
        title: 'Внимание!',
        content: 'Вы даете рейтинг как продюсер!',

        buttons: {
            confirm: function () {
              $("#input-1").rating("refresh", {disabled:true, showClear:false});
              $("#input-2").rating("refresh", {disabled:true, showClear:false});
              $("#input-3").rating("refresh", {disabled:true, showClear:false});
            },
            cancel: function () {
                
            },
          }
        });
        event.stopImmediatePropagation();
        
    });
    $("#input-2").rating().on("change", function(event, value, caption) {
        var input2 = $('#input-2').val();
        $('#inp2').val(input2);
        $('#inp1').val(inp1);
        $('#inp3').val(inp3);

        $("#input-1").val(inp1);
        $("#input-3").val(inp3);
        $.confirm({
        title: 'Внимание!',
        content: 'Вы даете рейтинг как режисёр!',
        buttons: {
            продолжить: function () {
              $("#input-1").rating("refresh", {disabled:true, showClear:false});
              $("#input-2").rating("refresh", {disabled:true, showClear:false});
              $("#input-3").rating("refresh", {disabled:true, showClear:false});
            },
            отмена: function () {
                
            },
          }
        });
        event.stopImmediatePropagation();
    });
    $("#input-3").rating().on("change", function(event, value, caption) {
        var input3 = $('#input-3').val();
        $('#inp3').val(input3);
        $('#inp2').val(inp2);
        $('#inp1').val(inp1);

        $("#input-2").val(inp2);
        $("#input-1").val(inp1);
        $.confirm({
        title: 'Внимание!',
        content: 'Вы даете рейтинг как клиент!',
        buttons: {
            confirm: function () {

              $("#input-1").rating("refresh", {disabled:true, showClear:false});
              $("#input-2").rating("refresh", {disabled:true, showClear:false});
              $("#input-3").rating("refresh", {disabled:true, showClear:false});

            },
            cancel: function () {
                
                
            },
          }
        });

        event.stopImmediatePropagation();
    });
  });
</script>

</body>
</html>
