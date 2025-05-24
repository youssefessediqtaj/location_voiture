<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - DRIOUCHI CAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-image {
            background-image: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="min-h-screen bg-image flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="glass-effect shadow-2xl rounded-2xl p-8">
            <div class="flex flex-col items-center mb-8">
                {{-- <svg class="w-16 h-16 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v4a4 4 0 004 4h10a4 4 0 004-4V7M7 7V5a5 5 0 0110 0v2"/>
                </svg> --}}
                <span class="text-3xl font-bold text-blue-700">DRIOUCHI CAR</span>
            </div>

            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-8">Connexion à votre compte</h2>

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-600 text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" name="email" type="email"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                           value="{{ old('email') }}" required autofocus />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                    <input id="password" name="password" type="password"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-200"
                           required />
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200"
                               {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                    </label>
                    <a href="{{ route('register') }}"
                       class="text-blue-600 hover:text-blue-700 text-sm font-medium transition duration-200">
                        Créer un compte
                    </a>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 transform hover:scale-[1.02]">
                    Se connecter
                </button>
            </form>
        </div>
    </div>
</body>
</html>
