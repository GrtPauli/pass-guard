@if(session()->has('message'))
    <div  x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-2 left-5 transform p-3 z-[99999] notification-toast">
        <div class="w-[300px] bg-white border border-gray-200 rounded-xl shadow-lg" role="alert">
            <div class="flex p-5 px-5 items-center gap-3">
              <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-6 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                </svg>
              </div>
              <div class="ms-3">
                <p class="text-teal-500 font-bold text-sm mb-2">Success</p>
                <p class="text-xs text-gray-700">
                    {{session('message')}}
                </p>
              </div>
            </div>
        </div>
    </div>
@endif