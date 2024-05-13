<x-app>
  <x-slot name="title">
    ログイン
  </x-slot>

  <div class="flex flex-col items-center sm:pt-0">
    <div class="w-full sm:max-w-xl p-8 bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
      @foreach ($errors->all() as $error)
        <li class="text-red-400 list-none">{{ $error }}</li>
      @endforeach
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-8">
          <label for="email">メールアドレス</label>
          <input type="email" name="email" id="email" value="{{ old('email') }}" class="block mt-1 w-full text-gray-800 p-1">
        </div>

        <div class="mb-8">
          <label for="password">パスワード</label>
          <input type="password" name="password" id="password" class="block mt-1 w-full text-gray-800 p-1">
        </div>

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md text-sm text-gray-800 uppercase tracking-widest hover:bg-white focus:bg-white active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150 font-black">送信</button>
      </form>
    </div>
  </div>
</x-app>