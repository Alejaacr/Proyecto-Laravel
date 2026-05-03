<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login Odontología</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #0f4c81, #1e90ff);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background: white;
    padding: 30px;
    border-radius: 15px;
    width: 350px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    text-align: center;
}

h2 {
    color: #0f4c81;
}

input, select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 12px;
    background: #1e90ff;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

button:hover {
    background: #0f4c81;
}

.error {
    background: #ffdede;
    color: red;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 10px;
}
</style>

</head>
<body>

<div class="container">

<h2>🔐 Iniciar Sesión</h2>

@if(session('error'))
<div class="error">
    {{ session('error') }}
</div>
@endif

<form method="POST" action="/login">
@csrf

<select name="usuario" required>
    <option value="">Seleccione usuario</option>
    <option value="deivid">Odontólogo Deivid</option>
    <option value="sebastian">Odontólogo Sebastian</option>
    <option value="alejandra">Odontóloga Alejandra</option>
</select>

<input type="password" name="pass" placeholder="Contraseña (1234)" required>

<button type="submit">Ingresar</button>

</form>

<br>

<a href="/rapido">
    <button style="background:#ffc107;">Agendamiento rápido</button>
</a>

</div>

</body>
</html>
