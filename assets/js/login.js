function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
   
   var a = document.getElementById("loginBtn");
   var b = document.getElementById("registerBtn");
   var x = document.getElementById("login");
   var y = document.getElementById("register");

   function login() {
       x.style.left = "4px";
       y.style.right = "-520px";
       a.className += " white-btn";
       b.className = "btn";
       x.style.opacity = 1;
       y.style.opacity = 0;
   }

   function register() {
       x.style.left = "-510px";
       y.style.right = "5px";
       a.className = "btn";
       b.className += " white-btn";
       x.style.opacity = 0;
       y.style.opacity = 1;
   }

   
   document.getElementById('buscarCliente').addEventListener('click', function() {
    let dni = document.getElementById('dni').value;

    fetch('../component/buscar_cliente.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `dni=${dni}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('nombres').value = data.nombres;
            document.getElementById('apellidoPaterno').value = data.apellidoPaterno;
            document.getElementById('apellidoMaterno').value = data.apellidoMaterno;
        } else {
            alert('Cliente no encontrado');
        }
    })
    .catch(error => console.error('Error:', error));
});
