

function hideshow() {
  var x = document.getElementById("categos");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function hideshow2() {
  var x = document.getElementById("hideshow2");
  var x1 = document.getElementById("categos");
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
  if (x1.style.display === "block") {
    x1.style.display = "none";
  } 
}


function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
  
    if(pass1.value.length > 5)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 6 digit!"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "ok!"
    }
  else
    {
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
    }
}  