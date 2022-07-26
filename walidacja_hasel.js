//ODKRYWANIE HASŁA
function myFunction() {
  var x = document.getElementById("haslo");
  var y = document.getElementById("haslo2");
  var z = document.getElementById("haslo3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }

  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }
  
}

/////