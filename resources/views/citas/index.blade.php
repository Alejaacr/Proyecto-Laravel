<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendamiento de Citas</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins', sans-serif;
    background:
    linear-gradient(rgba(0,70,120,0.65), rgba(0,120,180,0.65)),
    url('https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    min-height:100vh;
}

.container{
    width:92%;
    margin:auto;
    padding:30px 0;
}

.top-bar{
    text-align:right;
    margin-bottom:18px;
}

.logout{
    background:linear-gradient(135deg,#ff4b4b,#c40000);
    color:white;
    border:none;
    padding:12px 18px;
    border-radius:12px;
    font-weight:700;
    cursor:pointer;
    box-shadow:0 10px 20px rgba(0,0,0,0.18);
}

.logout:hover{
    transform:translateY(-2px);
}

.card{
    background:rgba(246, 248, 250, 0.95);
    backdrop-filter:blur(10px);
    padding:28px;
    border-radius:22px;
    margin-bottom:25px;
    box-shadow:0 18px 40px rgba(0,0,0,0.18);

    /* BORDES MÁS VISIBLES */
    border:3px solid #0a4f79;

    /* CONTORNO EXTRA */
    outline:2px solid rgba(30,144,255,0.18);
    outline-offset:0;
}

h2{
    text-align:center;
    color:#0a4f79;
    font-size:30px;
    font-weight:800;
    margin-bottom:22px;
    letter-spacing:0.5px;
}

input{
    width:100%;
    padding:14px 15px;
    margin:9px 0;
    border-radius:14px;
    background:#eef7fc;
    font-size:15px;
    font-weight:600;
    color:#1d3b4d;

    /* BORDE MÁS VISIBLE */
    border:2px solid #5aa9d6;

    transition:0.3s;
}

input:focus{
    background:white;
    border:2px solid #1e90ff;
    outline:none;
    box-shadow:0 0 10px rgba(30,144,255,0.25);
}

button{
    border:none;
    cursor:pointer;
    transition:0.3s;
    font-family:'Poppins', sans-serif;
}

.btn-primary{
    width:100%;
    padding:15px;
    margin-top:12px;
    border-radius:14px;
    background:linear-gradient(135deg,#00b4db,#0083b0);
    color:white;
    font-size:16px;
    font-weight:700;
    box-shadow:0 10px 18px rgba(0,131,176,0.25);
}

.btn-primary:hover{
    transform:translateY(-2px);
}

.btn-edit{
    background:linear-gradient(135deg,#ffb347,#ff8800);
    color:white;
    padding:10px 14px;
    border-radius:10px;
    font-weight:700;
}

.btn-delete{
    background:linear-gradient(135deg,#ff5f5f,#d60000);
    color:white;
    padding:10px 14px;
    border-radius:10px;
    font-weight:700;
}

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:16px;
}

th{
    background:linear-gradient(135deg,#00b4db,#0083b0);
    color:white;
    padding:14px;
    font-size:14px;
    font-weight:700;
}

td{
    background:white;
    padding:12px;
    text-align:center;
    border-bottom:1px solid #edf2f7;
    font-weight:600;
    color:#314c5c;
}

tr:hover td{
    background:#f3fbff;
}

.error-box{
    background:#ffe7e7;
    color:#c40000;
    padding:14px;
    border-radius:12px;
    margin-bottom:16px;
    font-weight:700;
}

.success-box{
    background:#e7ffe9;
    color:#15803d;
    padding:14px;
    border-radius:12px;
    margin-bottom:16px;
    font-weight:700;
}

ul{
    margin-top:8px;
    padding-left:20px;
}
</style>
</head>
<body>

<div class="container">

<div class="top-bar">
<a href="/logout">
<button class="logout">Cerrar sesión</button>
</a>
</div>

<!-- FORMULARIO -->
<div class="card">

<h2>🦷 Registrar Cita</h2>

@if(session('success'))
<div class="success-box">
{{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="error-box">
<strong>Errores:</strong>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form method="POST" action="/citas">
@csrf

<input type="text" name="nombre" placeholder="Nombre completo"
value="{{ old('nombre') }}"
onkeypress="return soloLetras(event)"
onpaste="bloquearPegarLetras(event)"
required>

<input type="text" name="documento" placeholder="Documento"
value="{{ old('documento') }}"
onkeypress="return soloNumeros(event)"
onpaste="bloquearPegarNumeros(event)"
required>

<input type="text" name="tipo_cita" placeholder="Tipo de cita"
value="{{ old('tipo_cita') }}"
onkeypress="return soloLetras(event)"
onpaste="bloquearPegarLetras(event)"
required>

<input type="text" name="eps" placeholder="EPS"
value="{{ old('eps') }}"
onkeypress="return soloLetras(event)"
onpaste="bloquearPegarLetras(event)"
required>

<input type="number" name="edad" placeholder="Edad"
value="{{ old('edad') }}"
onkeypress="return soloNumeros(event)"
required>

<input type="date" name="fecha" value="{{ old('fecha') }}" required>
<input type="time" name="hora" value="{{ old('hora') }}" required>

<button class="btn-primary" type="submit">Guardar Cita</button>

</form>
</div>

<!-- TABLA -->
<div class="card">

<h2>📋 Listado de Citas</h2>

<table>
<thead>
<tr>
<th>Nombre</th>
<th>Documento</th>
<th>Tipo</th>
<th>EPS</th>
<th>Edad</th>
<th>Fecha</th>
<th>Hora</th>
<th>Acciones</th>
</tr>
</thead>

<tbody>
@foreach($citas as $cita)
<tr>

<td>{{ $cita->nombre }}</td>
<td>{{ $cita->documento }}</td>
<td>{{ $cita->tipo_cita }}</td>
<td>{{ $cita->eps }}</td>
<td>{{ $cita->edad }}</td>
<td>{{ $cita->fecha }}</td>
<td>{{ $cita->hora }}</td>

<td>

<a href="/citas/{{ $cita->id }}/edit">
<button class="btn-edit">Editar</button>
</a>

<form action="/citas/{{ $cita->id }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button class="btn-delete" onclick="return confirm('¿Eliminar esta cita?')">
Eliminar
</button>
</form>

</td>
</tr>
@endforeach
</tbody>

</table>

</div>
</div>

<script>
function beep(){
const audio = new Audio('https://www.soundjay.com/button/beep-07.wav');
audio.play();
}

function soloLetras(e){
let key = e.key;
if(['Backspace','Tab','ArrowLeft','ArrowRight','Delete'].includes(key)) return true;

if(!/^[a-zA-Z\s]$/.test(key)){
e.preventDefault();
beep();
return false;
}
}

function soloNumeros(e){
let key = e.key;
if(['Backspace','Tab','ArrowLeft','ArrowRight','Delete'].includes(key)) return true;

if(!/^[0-9]$/.test(key)){
e.preventDefault();
beep();
return false;
}
}

function bloquearPegarLetras(e){
let texto = (e.clipboardData || window.clipboardData).getData('text');
if(!/^[a-zA-Z\s]+$/.test(texto)){
e.preventDefault();
beep();
}
}

function bloquearPegarNumeros(e){
let texto = (e.clipboardData || window.clipboardData).getData('text');
if(!/^[0-9]+$/.test(texto)){
e.preventDefault();
beep();
}
}
</script>

</body>
</html>