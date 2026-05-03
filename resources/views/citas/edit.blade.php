<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Cita</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins',sans-serif;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:25px;

    background:
    linear-gradient(rgba(0,70,120,0.65), rgba(0,120,180,0.65)),
    url('https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
}

/* decoración */
body::before{
    content:"🦷";
    position:absolute;
    top:30px;
    left:40px;
    font-size:70px;
    opacity:0.15;
}

body::after{
    content:"🪥";
    position:absolute;
    bottom:30px;
    right:40px;
    font-size:70px;
    opacity:0.15;
}

.card{
    width:430px;
    max-width:100%;
    background:rgba(255,255,255,0.95);
    backdrop-filter:blur(10px);
    padding:32px;
    border-radius:24px;
    box-shadow:0 18px 40px rgba(0,0,0,0.20);
    border:3px solid #0a4f79;
    outline:2px solid rgba(30,144,255,0.15);
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
    border:2px solid #5aa9d6;
    transition:0.3s;
}

input:focus{
    background:white;
    border:2px solid #1e90ff;
    outline:none;
    box-shadow:0 0 10px rgba(30,144,255,0.22);
}

button{
    width:100%;
    padding:15px;
    margin-top:14px;
    border:none;
    border-radius:14px;
    cursor:pointer;
    font-family:'Poppins',sans-serif;
    font-size:16px;
    font-weight:700;
    color:white;
    background:linear-gradient(135deg,#00b4db,#0083b0);
    box-shadow:0 10px 18px rgba(0,131,176,0.25);
    transition:0.3s;
}

button:hover{
    transform:translateY(-2px);
}

@media(max-width:500px){
    .card{
        padding:24px;
    }

    h2{
        font-size:24px;
    }
}
</style>
</head>
<body>

<div class="card">

<h2>🦷 Editar Cita</h2>

<form method="POST" action="/citas/{{ $cita->id }}">
@csrf
@method('PUT')

<input type="text" name="nombre" value="{{ $cita->nombre }}" required>
<input type="text" name="documento" value="{{ $cita->documento }}" required>
<input type="text" name="tipo_cita" value="{{ $cita->tipo_cita }}" required>
<input type="text" name="eps" value="{{ $cita->eps }}" required>
<input type="number" name="edad" value="{{ $cita->edad }}" required>
<input type="date" name="fecha" value="{{ $cita->fecha }}" required>
<input type="time" name="hora" value="{{ $cita->hora }}" required>

<button type="submit">Actualizar Cita</button>

</form>
</div>

</body>
</html>
