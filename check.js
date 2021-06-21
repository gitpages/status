var form = document.querySelector('form');
form.addEventListener('submit', function (event) {
   event.preventDefault();
   var data = new FormData(form);
   check(data);
});

function check (data){
   var request = new XMLHttpRequest();
   request.addEventListener('load', function(event) {
      if (request.status >= 200 && request.status < 300) {
         console.log(request.responseText);
      } else {
         console.warn(request.statusText, request.responseText);
      }
   });
   request.open("POST","usernamecheck.php");
   request.send(data);
}
