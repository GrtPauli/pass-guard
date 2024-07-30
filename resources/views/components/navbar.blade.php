<header class="bg-white shadow-xl fixed top-0 w-full z-50 flex items-center justify-between whitespace-nowrap px-10 py-[0px]">
  <a href="/" class="flex items-center gap-4 text-[#141118]">
    <img class="w-[200px]" src="{{asset('images/logo.png')}}"/>
  </a>

  <div class="flex flex-1 justify-end gap-8">
    <div class="flex items-center gap-9">
      {{-- <a class="text-[#141118] text-sm font-medium leading-normal" href="/dashboard">My Passwords</a> --}}
      {{-- <a class="text-[#141118] text-sm font-medium leading-normal" href="/about-us">About Us</a>
      <a class="text-[#141118] text-sm font-medium leading-normal" href="/my-profile">My Profile</a> --}}
      
      
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
          <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
        </svg>        
        <p >{{auth()->user()->username}}</p>
      </div>

      <form action="/api/logout" method="post">
        @csrf        
        <button class="flex cursor-pointer items-center justify-center overflow-hidden rounded-xl py-2.5 bg-black/20 text-skin-text gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-4">
          <div
            class="text-skin-text flex items-center gap-2"
            data-icon="Question"
            data-size="20px"
            data-weight="regular"
          >
            <p>Sign Out</p>
          </div>
        </button>
      </form>
    </div>

    {{-- <div
      class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
      style='background-image: url("https://cdn.usegalileo.ai/sdxl10/10dea63a-4b13-46a7-8a20-86e3bc38ad08.png")'
    > --}}
  </div>
</div>
</header>