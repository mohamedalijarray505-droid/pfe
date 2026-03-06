<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ellyssa FM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Reset & Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at top, #1b3c2f, #000);
            color: #fff;
        }

        /* Container */
        .container {
            background: rgba(255, 255, 255, 0.07);
            padding: 60px 40px;
            border-radius: 25px;
            text-align: center;
            width: 100%;
            max-width: 480px;
            backdrop-filter: blur(15px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.5);
            transition: transform 0.3s ease;
        }
        .container:hover {
            transform: translateY(-5px);
        }

        /* Logo */
        .logo {
            width: 160px;
            margin: 0 auto 30px;
        }
        .logo img {
            width: 100%;
            height: auto;
            filter: drop-shadow(0 12px 30px rgba(0,0,0,0.6));
        }

        /* Headings */
        h1 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            opacity: 0.85;
            margin-bottom: 35px;
        }

        /* Buttons */
        .buttons {
            display: flex;
            gap: 18px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            flex: 1;
            min-width: 130px;
            padding: 14px 0;
            border-radius: 30px;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .btn-login {
            border: 2px solid #3cff9e;
            color: #3cff9e;
            background: transparent;
        }
        .btn-login:hover {
            background: #3cff9e;
            color: #000;
        }
        .btn-register {
            background: #3cff9e;
            color: #000;
            border: 2px solid #3cff9e;
        }
        .btn-register:hover {
            background: transparent;
            color: #3cff9e;
        }

        /* Footer */
        footer {
            margin-top: 30px;
            font-size: 13px;
            opacity: 0.6;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .container {
                padding: 40px 20px;
            }
            h1 { font-size: 28px; }
            p { font-size: 14px; }
            .buttons { gap: 12px; }
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('logo.png') }}" alt="Ellyssa FM Logo">
        </div>

        <h1>Ellyssa FM</h1>
        <p>Galerie vidéo & production radio</p>

        <!-- Buttons -->
        <div class="buttons">
           <a href="{{ route('login') }}" class="btn btn-login">Login</a>
          <a href="{{ route('register') }}" class="btn btn-register">Register</a>

        </div>

        <!-- Footer -->
        <footer>
            © {{ date('Y') }} Ellyssa FM
        </footer>
    </div>

</body>
</html>
