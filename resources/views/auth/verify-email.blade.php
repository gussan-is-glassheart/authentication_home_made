<x-app>
  <x-slot name="title">
    確認メール送信
  </x-slot>

  <div class="text-center">
    @if(!Auth::user()->email_verified_at)
    <h2 class="text-4xl my-12">
      <span class="border-b-2">
        送信メールを確認してください
      </span>
    </h2>

      <form method="post" action="{{ route('verification.send') }}">
        @method('post')
        @csrf

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md text-sm text-gray-800 uppercase tracking-widest hover:bg-white focus:bg-white active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150 font-black">確認メールを再送信</button>
      </form>
    @else
    <h2 class="text-4xl my-12">
      すでにこのアカウントは認証済みです
    </h2>
    @endif
  </div>
</x-app>