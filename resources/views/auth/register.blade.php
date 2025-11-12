<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>

        <form method="POST" action="/register" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Name"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300" required>
            <input type="email" name="email" placeholder="Email"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300" required>
            <input type="password" name="password" placeholder="Password"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300" required>

            <button type="submit"
                class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">
                Register
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            Sudah punya akun? <a href="/login" class="text-green-500 hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
