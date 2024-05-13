<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-900">
      @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
          @auth
            <form method="POST" action="{{ route('user.logout') }}">
              @csrf

              <a href="{{ route('profile') }}" class="font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">プロフィール</a>

              <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="ml-4 font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                ログアウト
              </a>
            </form>
          @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ログイン</a>

            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">新規登録</a>
            @endif
          @endauth
        </div>
      @endif

      <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="p-4 text-gray-100 sm:rounded-lg">
        @if(session('message'))
          <div class="max-w-7xl mx-auto mb-6 sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-4 text-gray-100 sm:rounded-lg">
              {{ session('message') }}
            </div>
          </div>
        @endif
          <h1 class="font-semibold text-3xl text-gray-200 leading-tight text-center mb-8">
            {{ $title }}
          </h1>

          {{ $slot }}
        </div>
      </div>

    </div>
  </body>
</html>