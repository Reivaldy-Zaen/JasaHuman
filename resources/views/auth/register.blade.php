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
            max-width: 900px;
            padding: 2rem;
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: fit-content;
            max-height: 85vh;
            overflow-y: auto;
            position: relative;
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
            font-size: 2.5rem;
            color: #4caf50;
            background: #e8f5e9;
            padding: 12px;
            border-radius: 50%;
        }
        
        .logo h1 {
            color: #333;
            font-size: 1.6rem;
            margin-top: 0.8rem;
            font-weight: 700;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
            .register-card {
                max-width: 600px;
            }
        }
        
        @media (max-width: 480px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .register-card {
                max-width: 400px;
                padding: 1.5rem;
            }
        }
        
        .span-2 {
            grid-column: span 2;
        }
        
        .span-3 {
            grid-column: span 3;
        }
        
        @media (max-width: 768px) {
            .span-3 {
                grid-column: span 2;
            }
        }
        
        @media (max-width: 480px) {
            .span-2, .span-3 {
                grid-column: span 1;
            }
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 1rem;
        }
        
        .input-group input, .input-group select {
            width: 100%;
            padding: 12px 16px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        
        .input-group input:focus, .input-group select:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
            outline: none;
        }
        
        .role-section {
            grid-column: span 3;
        }
        
        @media (max-width: 768px) {
            .role-section {
                grid-column: span 2;
            }
        }
        
        @media (max-width: 480px) {
            .role-section {
                grid-column: span 1;
            }
        }
        
        .role-options {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }
        
        .role-option {
            flex: 1;
            text-align: center;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
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
            padding: 12px;
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 0 4px 6px rgba(76, 175, 80, 0.3);
            margin-top: 1rem;
        }
        
        .btn-register:hover {
            background: #43a047;
            transform: translateY(-2px);
        }
        
        .btn-register:active {
            transform: translateY(0);
        }
        
        .btn-back {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 8px;
            background: #888;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-back:hover {
            background: #6b6b6b;
            transform: translateY(-1px);
        }
        
        .btn-back:active {
            transform: translateY(0);
        }
        
        .btn-back svg {
            width: 16px;
            height: 16px;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1rem;
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
        
        .footer-text {
            text-align: center;
            margin-top: 1rem;
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
        
        .role-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }
        
        .hidden-role-input {
            display: none;
        }
        /* Tambahkan style ini di bagian CSS */
.custom-file-input {
    display: none;
}

.custom-file-label {
    display: block;
    padding: 12px 16px;
    border: 2px dashed #ddd;
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
    color: #888;
}

.custom-file-label:hover {
    border-color: #4caf50;
    color: #4caf50;
}

.custom-file-label i {
    margin-right: 8px;
}
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="logo" id="logoContainer">
                <i class="fas fa-users"></i>
                <h1>Daftar Akun Baru</h1>
            </div>

            <!-- Alert Error -->
            <div class="alert alert-error" style="display: none;" id="errorAlert">
                <i class="fas fa-exclamation-circle"></i>
                <span id="errorText">Terjadi kesalahan</span>
            </div>

            <!-- Alert Success -->
            <div class="alert alert-success" style="display: none;" id="successAlert">
                <i class="fas fa-check-circle"></i>
                <span id="successText">Pendaftaran berhasil</span>
            </div>

            <!-- Role Selection -->
            <div class="role-section" id="roleSelection">
                <label class="role-label">Daftar Sebagai</label>
                <div class="role-options">
                    <label class="role-option" id="workerOption">
                        <input type="radio" name="role" value="pekerja" required>
                        <i class="fas fa-tools"></i> Pekerja
                    </label>
                    <label class="role-option" id="clientOption">
                        <input type="radio" name="role" value="klien">
                        <i class="fas fa-briefcase"></i> Klien
                    </label>
                </div>
            </div>

            <!-- Form Daftar -->
            <form action="{{route('register.process')}}" method="POST" id="registerForm" style="display: none;" enctype="multipart/form-data">
                @csrf
                <!-- Input tersembunyi untuk menyimpan nilai role -->
                <input type="hidden" name="role" id="selectedRole" value="">
                
                <button type="button" class="btn-back" onclick="goBack()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/>
                    </svg>
                </button>
                
                <!-- Preview foto - Hanya untuk pekerja -->
                <div class="photo-preview-container" style="text-align: center; margin-bottom: 1.5rem; display: none;" id="photoPreviewContainer">
                    <div class="photo-preview" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; margin: 0 auto; border: 3px solid #4caf50; background-color: #f0f0f0;">
                        <img id="photoPreview" src="" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <p style="margin-top: 10px; color: #555; font-size: 0.9rem;">Foto Profil</p>
                </div>
                
                <div class="form-grid">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="phone" placeholder="Nomor HP" value="{{ old('phone') }}" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-venus-mars"></i>
                        <select name="gender" required>
                            <option value="">Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Kata Sandi" value="{{ old('password') }}" required>
                        <span class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <!-- Field umur untuk semua pengguna (required) -->
                    <div class="input-group">
                        <i class="fas fa-birthday-cake"></i>
                        <input type="number" name="umur" placeholder="Umur *" value="{{ old('umur') }}" min="1" max="100" required>
                    </div>
                </div>

                <!-- Bagian tambahan hanya untuk pekerja -->
                <div id="workerExtra" class="form-grid" style="display:none; margin-top:10px;">
                    <div class="input-group">
                        <i class="fas fa-globe"></i>
                        <input type="text" name="negara" placeholder="Negara" value="{{ old('negara') }}">
                    </div>

                    <!-- Input file foto HANYA untuk pekerja -->
                    <div class="input-group span-2">
                        <label class="custom-file-label" for="fotoInput">
                            <i class="fas fa-upload"></i> Pilih Foto Profil
                        </label>
                        <input type="file" name="foto" id="fotoInput" class="custom-file-input" accept="image/*" onchange="previewImage(event)">
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </button>
            </form>

            <div class="footer-text">
                Sudah punya akun? <a href="{{route('login')}}">Masuk di sini</a>
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
    const workerExtra = document.getElementById('workerExtra');
    const registerForm = document.getElementById('registerForm');
    const roleSelection = document.getElementById('roleSelection');
    const selectedRoleInput = document.getElementById('selectedRole');
    const photoPreviewContainer = document.getElementById('photoPreviewContainer');
    const logoContainer = document.getElementById('logoContainer'); // ✅ tambahan untuk kontrol logo
    
    workerOption.addEventListener('click', () => {
        workerOption.classList.add('selected');
        clientOption.classList.remove('selected');
        selectedRoleInput.value = 'pekerja';
        workerExtra.style.display = "grid"; 
        registerForm.style.display = "block";
        roleSelection.style.display = "none"; 

        // ✅ Sembunyikan logo untuk pekerja
        logoContainer.style.display = 'none';

        // Tampilkan preview jika sudah ada gambar
        const preview = document.getElementById('photoPreview');
        if (preview.src) {
            photoPreviewContainer.style.display = 'block';
        }
    });
    
    clientOption.addEventListener('click', () => {
        clientOption.classList.add('selected');
        workerOption.classList.remove('selected');
        selectedRoleInput.value = 'klien';
        workerExtra.style.display = "none"; 
        registerForm.style.display = "block"; 
        roleSelection.style.display = "none"; 
        
        // ✅ Tampilkan logo untuk klien
        logoContainer.style.display = 'block';

        // Sembunyikan preview foto untuk klien
        photoPreviewContainer.style.display = 'none';
    });

    function goBack() {
        registerForm.style.display = "none";
        roleSelection.style.display = "block";
        workerOption.classList.remove('selected');
        clientOption.classList.remove('selected');
        selectedRoleInput.value = '';
        workerExtra.style.display = "none"; 
        photoPreviewContainer.style.display = 'none';
        registerForm.reset();

        // ✅ Kembalikan logo kalau ke halaman awal
        logoContainer.style.display = 'block';
    }
    
    document.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.querySelector('i').style.color = '#4caf50';
        });
        
        input.addEventListener('blur', () => {
            input.parentElement.querySelector('i').style.color = '#888';
        });
    });
    
    function showAlert(type, message) {
        const errorAlert = document.getElementById('errorAlert');
        const successAlert = document.getElementById('successAlert');
        
        errorAlert.style.display = 'none';
        successAlert.style.display = 'none';
        
        if (type === 'error') {
            document.getElementById('errorText').textContent = message;
            errorAlert.style.display = 'flex';
        } else {
            document.getElementById('successText').textContent = message;
            successAlert.style.display = 'flex';
        }
    }
    
    registerForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        if (!selectedRoleInput.value) {
            showAlert('error', 'Silakan pilih role (Pekerja atau Klien) sebelum mendaftar.');
            return;
        }
        
        this.submit(); 
    });
    
    // Fungsi untuk preview gambar
    function previewImage(event) {
        const input = event.target;
        const previewContainer = document.getElementById('photoPreviewContainer');
        const preview = document.getElementById('photoPreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                // Hanya tampilkan preview jika role adalah pekerja
                if (selectedRoleInput.value === 'pekerja') {
                    previewContainer.style.display = 'block';
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            previewContainer.style.display = 'none';
        }
    }

    @if($errors->any())
        showAlert('error', '{{ $errors->first() }}');

        @if(old('role'))
            document.getElementById('selectedRole').value = '{{ old('role') }}';
            if ('{{ old('role') }}' === 'pekerja') {
                workerOption.classList.add('selected');
                workerExtra.style.display = "grid";
                // ✅ Sembunyikan logo jika role pekerja dari old()
                logoContainer.style.display = 'none';
                // Tampilkan preview jika ada file foto yang diupload sebelumnya
                if (document.getElementById('fotoInput').files.length > 0) {
                    document.getElementById('photoPreviewContainer').style.display = 'block';
                }
            } else {
                clientOption.classList.add('selected');
                // ✅ Tampilkan logo jika role klien dari old()
                logoContainer.style.display = 'block';
                document.getElementById('photoPreviewContainer').style.display = 'none';
            }
            registerForm.style.display = "block";
            roleSelection.style.display = "none";
        @endif
    @endif
</script>

</body>
</html>