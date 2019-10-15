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


  $("#input-1").fileinput({
      allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
      
  });
  $("#input-2").fileinput({
      allowedFileExtensions: ["MP4", "AVI", "MOV", "mov"]
  });






var figure = $(".video").hover( hoverVideo, hideVideo );

function hoverVideo(e) {  
    $('video', this).get(0).play(); 
}

function hideVideo(e) {
    $('video', this).get(0).pause(); 
}


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