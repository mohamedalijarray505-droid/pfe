<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Register | Ellyssa FM</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    margin:0;
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: radial-gradient(circle at top, #1b3c2f, #000);
    color: #fff;
}

.register-container {
    background: rgba(255,255,255,0.06);
    padding: 50px 40px;
    border-radius: 20px;
    width: 100%;
    max-width: 400px;
    text-align: center;
    backdrop-filter: blur(15px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.5);
}

.register-container .logo {
    margin-bottom: 25px;
}

.register-container .logo img {
    width: 120px;
    filter: drop-shadow(0 10px 20px rgba(0,0,0,0.6));
}

h2 {
    font-weight: 600;
    margin-bottom: 10px;
}

p {
    font-size: 14px;
    opacity: 0.85;
    margin-bottom: 30px;
}

/* Form Inputs */
.form-group {
    position: relative;
    margin-bottom: 20px;
}

.form-group input {
    width: 90%;        /* au lieu de 100% */
    max-width: 350px;  /* limite horizontale */
    padding: 12px 40px 12px 15px;
    border-radius: 10px;
    border: none;
    outline: none;
    background: rgba(255,255,255,0.12);
    color: #fff;
    display: block;
    margin: 0 auto;    /* centre horizontalement */
}


.form-group input::placeholder {
    color: rgba(255,255,255,0.6);
}

.form-group i {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    color: #3cff9e;
    font-size: 18px;
}

/* Button */
button {
    width: 100%;
    padding: 14px;
    border-radius: 30px;
    border: none;
    background: #3cff9e;
    color: #000;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background: #2fd88a;
}

/* Footer link */
.register-footer {
    margin-top: 20px;
    font-size: 13px;
}

.register-footer a {
    color: #3cff9e;
    text-decoration: none;
}
</style>
</head>
<body>

<div class="register-container">

    <!-- Logo -->
    <div class="logo">
        <img src="{{ asset('logo.png') }}" alt="Ellyssa FM Logo">
    </div>

    <h2>Créer un compte</h2>
    <p>Rejoignez la communauté Ellyssa FM</p>

    <!-- Form -->
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Nom complet" required>
            <i class="bi bi-person-fill"></i>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" required>
            <i class="bi bi-envelope-fill"></i>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Mot de passe" required>
            <i class="bi bi-lock-fill"></i>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
            <i class="bi bi-lock-fill"></i>
        </div>
        <button>S’inscrire</button>
    </form>

    <div class="register-footer">
        Déjà un compte ? <a href="{{ route('login') }}">Connexion</a>
    </div>

</div>

</body>
</html>
