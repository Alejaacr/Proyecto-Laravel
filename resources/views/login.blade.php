<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Odontología</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins', sans-serif;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:
    linear-gradient(rgba(0,70,120,0.55), rgba(0,120,180,0.55)),
    url('https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
}

.container{
    width:390px;
    background:rgba(255,255,255,0.94);
    backdrop-filter:blur(10px);
    padding:35px;
    border-radius:22px;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
    text-align:center;
    border:1px solid rgba(255,255,255,0.5);
}

.logo{
    width:85px;
    height:85px;
    margin:auto;
    margin-bottom:15px;
    border-radius:50%;
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:38px;
    color:white;
    box-shadow:0 8px 20px rgba(0,114,255,0.35);
}

h2{
    color:#0a4f79;
    font-size:30px;
    font-weight:800;
    margin-bottom:6px;
    letter-spacing:0.5px;
}

.subtitulo{
    color:#5c6f7c;
    font-size:14px;
    font-weight:600;
    margin-bottom:25px;
}

input, select{
    width:100%;
    padding:13px 15px;
    margin:10px 0;
    border:none;
    outline:none;
    border-radius:12px;
    background:#eef7fc;
    font-size:15px;
    font-weight:700;
    color:#18384d;
    transition:0.3s;
    border:2px solid transparent;
}

input:focus, select:focus{
    border:2px solid #1e90ff;
    background:white;
    box-shadow:0 0 8px rgba(30,144,255,0.2);
}

/* colores dinámicos del select */
.select-azul{
    background:#dbeeff !important;
    border:2px solid #1e90ff !important;
    color:#0052b4 !important;
}

.select-verde{
    background:#dff8e6 !important;
    border:2px solid #28a745 !important;
    color:#1d7a34 !important;
}

.select-morado{
    background:#f0e3ff !important;
    border:2px solid #8e44ad !important;
    color:#6c2d91 !important;
}

button{
    width:100%;
    padding:14px;
    margin-top:15px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#00b4db,#0083b0);
    color:white;
    font-size:16px;
    font-weight:700;
    cursor:pointer;
    transition:0.3s;
    box-shadow:0 10px 18px rgba(0,131,176,0.28);
}

button:hover{
    transform:translateY(-2px);
    background:linear-gradient(135deg,#0083b0,#005f87);
}

.error{
    background:#ffe5e5;
    color:#d10000;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
    font-size:14px;
    font-weight:700;
}

.footer{
    margin-top:18px;
    font-size:12px;
    color:#7a7a7a;
    font-weight:600;
}
</style>
</head>
<body>

<div class="container">

<div class="logo">🦷</div>

<h2>Bienvenido</h2>
<p class="subtitulo">Sistema de Gestión Odontológica</p>

@if(session('error'))
<div class="error">
    {{ session('error') }}
</div>
@endif

<form method="POST" action="/login">
@csrf

<select name="usuario" id="usuario" required>
    <option value="">Seleccione usuario</option>
    <option value="deivid">Odontólogo Deivid</option>
    <option value="sebastian">Odontólogo Sebastian</option>
    <option value="alejandra">Odontóloga Alejandra</option>
</select>

<input type="password" name="pass" placeholder="Ingrese contraseña">

<button type="submit">🔐 Ingresar al Sistema</button>

</form>

<div class="footer">
Consultorio Dental Premium © 2026
</div>

</div>

<script>
const usuario = document.getElementById("usuario");

usuario.addEventListener("change", function(){

    usuario.classList.remove("select-azul","select-verde","select-morado");

    if(this.value === "deivid"){
        usuario.classList.add("select-azul");
    }

    if(this.value === "sebastian"){
        usuario.classList.add("select-verde");
    }

    if(this.value === "alejandra"){
        usuario.classList.add("select-morado");
    }

});
</script>

</body>
</html>