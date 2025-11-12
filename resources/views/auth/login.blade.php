<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-blue-200 to-blue-400">
  <div class="bg-white/80 backdrop-blur-sm p-8 sm:p-10 rounded-2xl shadow-2xl w-full max-w-md mx-4 transform transition duration-500 hover:scale-[1.02]">
    <h1 class="text-3xl sm:text-4xl font-bold mb-6 text-center text-gray-800">Login</h1>

    {{-- Form Login --}}
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf
      <div>
        <input type="email" name="email" placeholder="Email"
          class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition duration-200 placeholder-gray-400" required>
      </div>

      <!-- Password Field with Show/Hide -->
      <div class="relative">
        <input id="password" type="password" name="password" placeholder="Password"
          class="w-full px-4 py-2.5 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition duration-200 placeholder-gray-400" required>
        <button type="button" id="togglePassword" 
          class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-blue-500 focus:outline-none">
          <!-- Eye Icon (default hidden password) -->
          <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            <circle cx="12" cy="12" r="3" />
          </svg>
          <!-- Eye Slash Icon (hidden initially) -->
          <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.8" stroke="currentColor" class="w-5 h-5 hidden">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M3 3l18 18M10.477 10.477A3 3 0 0012 15a3 3 0 002.121-.879M15.879 15.879C14.44 17.005 12.807 18 12 18c-4.478 0-8.269-2.944-9.542-7 .636-2.03 2.014-3.755 3.812-4.845m3.153-1.29C10.962 5.268 11.468 5 12 5c4.477 0 8.268 2.943 9.542 7a10.43 10.43 0 01-1.01 2.05" />
          </svg>
        </button>
      </div>

      <button type="submit"
        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2.5 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
        Login
      </button>
    </form>

    {{-- Link Register --}}
    <p class="mt-6 text-center text-sm text-gray-600">
      Belum punya akun?
      <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">
        Daftar sekarang
      </a>
    </p>
  </div>

  <script>
    // Show/Hide Password Logic
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeSlashIcon = document.getElementById('eyeSlashIcon');

    toggleBtn.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      eyeIcon.classList.toggle('hidden');
      eyeSlashIcon.classList.toggle('hidden');
    });
  </script>

  <style>
    /* Animasi halus saat card muncul */
    body > div {
      animation: fadeInUp 0.6s ease-out;
    }
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</body>
</html>
