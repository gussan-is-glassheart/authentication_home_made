<x-app>
  <x-slot name="title">
    プロフィール
  </x-slot>

  <div class="text-center">
    <h2 class="text-5xl my-12">
      <span class="border-b-4 px-6">
        {{ Auth::user()->name }}でログインしています
      </span>
    </h2>

    <form action="{{ route('user.logout') }}" method="post">
      @csrf
      <button class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md text-sm text-gray-800 uppercase tracking-widest hover:bg-white focus:bg-white active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150 font-black">ログアウト</button>
    </form>
  </div>
</x-app>