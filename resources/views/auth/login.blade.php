<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CarRentalPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="flex flex-col items-center mb-6">
            <svg class="w-12 h-12 text-blue-600 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v4a4 4 0 004 4h10a4 4 0 004-4V7M7 7V5a5 5 0 0110 0v2"/></svg>
            <span class="text-2xl font-bold text-blue-700">CarRentalPro</span>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-xl font-semibold text-center text-gray-700 mb-6">Connexion à votre compte</h2>
            @if($errors->any())
                <div class="mb-4 text-red-600 text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" class="mt-1 block w-full rounded border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" value="{{ old('email') }}" required autofocus />
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input id="password" name="password" type="password" class="mt-1 block w-full rounded border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required />
                </div>
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200" {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                    </label>
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline text-sm font-medium">Créer un compte</a>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html> 