<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Jasa Human</title>
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
        
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
        }
        
        .register-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            padding: 2.5rem;
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow-y: auto;
            max-height: 90vh;
        }
        
        .register-card:hover {
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
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        @media (min-width: 640px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
            
            .full-width {
                grid-column: span 2;
            }
        }
        
        .input-group {
            position: relative;
            margin-bottom: 1rem;
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 1.1rem;
        }
        
        .input-group input, .input-group select {
            width: 100%;
            padding: 14px 20px 14px 45px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .input-group input:focus, .input-group select:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
            outline: none;
        }
        
        .role-options {
            display: flex;
            gap: 10px;
            margin-bottom: 1rem;
        }
        
        .role-option {
            flex: 1;
            text-align: center;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .role-option.selected {
            border-color: #4caf50;
            background-color: #e8f5e9;
        }
        
        .role-option input {
            display: none;
        }
        
        .btn-register {
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
        
        .btn-register:hover {
            background: #43a047;
            transform: translateY(-2px);
        }
        
        .btn-register:active {
            transform: translateY(0);
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
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
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="logo">
                <i class="fas fa-users"></i>
                <h1>Daftar Akun Baru</h1>
            </div>

            <!-- Alert Error -->
            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </span>
                </div>
            @endif

            <!-- Alert Success -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form Daftar -->
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="input-group full-width">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                    </div>

                    <div class="input-group full-width">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="phone" placeholder="Nomor HP" value="{{ old('phone') }}" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-venus-mars"></i>
                        <select name="gender">
                            <option value="">Jenis Kelamin</option>
                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="input-group full-width">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Kata Sandi" required>
                        <span class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <div class="input-group full-width">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Kata Sandi" required>
                        <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="full-width">
                    <label style="display: block; margin-bottom: 10px; font-weight: 500; color: #555;">Daftar Sebagai</label>
                    <div class="role-options">
                        <label class="role-option {{ old('role') == 'pekerja' ? 'selected' : '' }}" id="workerOption">
                            <input type="radio" name="role" value="pekerja" {{ old('role') == 'pekerja' ? 'checked' : '' }} required>
                            Pekerja
                        </label>
                        <label class="role-option {{ old('role') == 'klien' ? 'selected' : '' }}" id="clientOption">
                            <input type="radio" name="role" value="klien" {{ old('role') == 'klien' ? 'checked' : '' }}>
                            Klien
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i> Daftar
                </button>
            </form>

            <div class="divider">
                <span>Atau daftar dengan</span>
            </div>

            <div class="social-login">
                <a href="#" class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-btn google">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-btn twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>

            <div class="footer-text">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk toggle password visibility
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = passwordInput.nextElementSibling.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
        
        // Fungsi untuk menangani pemilihan role
        const workerOption = document.getElementById('workerOption');
        const clientOption = document.getElementById('clientOption');
        
        workerOption.addEventListener('click', () => {
            workerOption.classList.add('selected');
            clientOption.classList.remove('selected');
            document.querySelector('input[name="role"][value="pekerja"]').checked = true;
        });
        
        clientOption.addEventListener('click', () => {
            clientOption.classList.add('selected');
            workerOption.classList.remove('selected');
            document.querySelector('input[name="role"][value="klien"]').checked = true;
        });
        
        // Menambahkan efek interaktif pada input
        document.querySelectorAll('input, select').forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.querySelector('i').style.color = '#4caf50';
            });
            
            input.addEventListener('blur', () => {
                input.parentElement.querySelector('i').style.color = '#888';
            });
        });
    </script>
</body>
</html>