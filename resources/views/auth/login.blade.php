<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jasa Human</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #4caf50, #2196f3);
            height: 100vh;
            overflow: hidden;
        }
        
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .logo i {
            font-size: 3rem;
            color: #4caf50;
            background: #e8f5e9;
            padding: 15px;
            border-radius: 50%;
        }
        
        .logo h1 {
            color: #333;
            font-size: 1.8rem;
            margin-top: 0.8rem;
            font-weight: 700;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 1.8rem;
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 1.1rem;
        }
        
        .input-group input {
            width: 100%;
            padding: 14px 20px 14px 45px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .input-group input:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
            outline: none;
        }
        
        .btn-login {
            width: 100%;
            padding: 14px;
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 0 4px 6px rgba(76, 175, 80, 0.3);
        }
        
        .btn-login:hover {
            background: #43a047;
            transform: translateY(-2px);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: opacity 0.5s ease-out;
        }
        
        .alert-error {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #c62828;
        }
        
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #2e7d32;
        }
        
        .alert i {
            font-size: 1.2rem;
        }
        
        .alert-hide {
            opacity: 0;
            height: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
            transition: all 0.5s ease-out;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .divider span {
            padding: 0 10px;
            color: #777;
            font-size: 0.9rem;
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #ddd;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 1.5rem;
        }
        
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: transform 0.3s;
        }
        
        .social-btn:hover {
            transform: scale(1.1);
        }
        
        .facebook {
            background: #3b5998;
        }
        
        .google {
            background: #dd4b39;
        }
        
        .twitter {
            background: #1da1f2;
        }
        
        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            color: #777;
            font-size: 0.9rem;
        }
        
        .footer-text a {
            color: #4caf50;
            text-decoration: none;
            font-weight: 500;
        }
        
        .footer-text a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 480px) {
            .login-card {
                margin: 0 20px;
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo">
                <i class="fas fa-users"></i>
                <h1>Jasa Human</h1>
            </div>

            <!-- Alert Error -->
            @if(session('error'))
                <div class="alert alert-error" id="errorAlert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Alert Success -->
            @if(session('success'))
                <div class="alert alert-success" id="successAlert">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form Login -->
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Alamat Email/Name" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Kata Sandi" required>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>
            </form>

            {{-- <div class="divider">
                <span>Atau masuk dengan</span>
            </div> --}}

            {{-- <div class="social-login">
                <a href="#" class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-btn google">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-btn twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </div> --}}

            <div class="footer-text">
                Belum punya akun? <a href="#">Daftar di sini</a><br>
                <a href="#">Lupa kata sandi?</a>
            </div>
        </div>
    </div>

    <script>
        // Menambahkan efek interaktif pada input
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.querySelector('i').style.color = '#4caf50';
            });
            
            input.addEventListener('blur', () => {
                input.parentElement.querySelector('i').style.color = '#888';
            });
        });

        // Fungsi untuk menyembunyikan alert secara otomatis
        function autoHideAlert(alertId, delay) {
            const alert = document.getElementById(alertId);
            if (alert) {
                setTimeout(() => {
                    alert.classList.add('alert-hide');
                    
                    // Hapus elemen dari DOM setelah transisi selesai
                    setTimeout(() => {
                        if (alert.parentNode) {
                            alert.parentNode.removeChild(alert);
                        }
                    }, 500);
                }, delay);
            }
        }

        // Sembunyikan alert error setelah 5 detik
        autoHideAlert('errorAlert', 5000);
        
        // Sembunyikan alert success setelah 3 detik (lebih cepat untuk logout message)
        autoHideAlert('successAlert', 3000);
    </script>
</body>
</html>