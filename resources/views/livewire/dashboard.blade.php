<div>
    @include('livewire.password-modal')
    <div class="px-20 flex flex-col gap-10">
        @if (session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-2 left-5 transform p-3 z-[99999] notification-toast">
                <div class="w-[350px] bg-white border border-gray-200 rounded-xl shadow-lg" role="alert">
                    <div class="flex py-4 px-[25px] items-center gap-3">
                    <div class="flex-shrink-0">
                        <svg class="flex-shrink-0 size-6 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                        </svg>
                    </div>
                    <div class="ms-3">
                        <p class="text-teal-500 font-bold text-sm mb-2">Success</p>
                        <p class="text-sm text-gray-700">
                            {{session('message')}}
                        </p>
                    </div>
                    </div>
                </div>
            </div>       
        @endif

        <div class="">
            <div class="flex w-full justify-between">
                <p class="text-[#141118] tracking-light text-[32px] font-bold leading-tight min-w-72 mb-5">My Passwords</p>
                <button type="button" data-bs-toggle="modal" data-bs-target="#passwordModal" class="shadow-xl flex w-auto cursor-pointer items-center justify-center gap-3 overflow-hidden rounded-xl h-12 px-4 bg-yellow-400 text-white hover:bg-white hover:!text-yellow-400 duration-150 ease-in text-sm font-semibold leading-normal tracking-[0.015em]">
                    <span class="truncate">Add Password</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                    </svg>              
                </button>
            </div>
            
            <div class="flex">
                <div class="shadow-lg border border-[#e0dce5] bg-white p-8 rounded-xl flex gap-4 min-w-[350px]">
                    <div class="bg-yellow-400 rounded-lg p-3">
                        <svg class="w-10 h-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M15 16C18.866 16 22 12.866 22 9C22 5.13401 18.866 2 15 2C11.134 2 8 5.13401 8 9C8 10.6628 8.57979 12.1902 9.54824 13.3911L3.96995 18.9694L2.96967 19.9697C2.67678 20.2626 2.67678 20.7374 2.96967 21.0303C3.26256 21.3232 3.73744 21.3232 4.03033 21.0303L4.5 20.5607L5.46967 21.5303C5.76256 21.8232 6.23744 21.8232 6.53033 21.5303C6.82322 21.2374 6.82322 20.7626 6.53033 20.4697L5.56066 19.5L6.5 18.5607L7.46967 19.5303C7.76256 19.8232 8.23744 19.8232 8.53033 19.5303C8.82322 19.2374 8.82322 18.7626 8.53033 18.4697L7.56066 17.5L10.6089 14.4518C11.8098 15.4202 13.3372 16 15 16ZM15 11C16.1046 11 17 10.1046 17 9C17 7.89543 16.1046 7 15 7C13.8954 7 13 7.89543 13 9C13 10.1046 13.8954 11 15 11Z" fill="#fff"></path> </g></svg>
                    </div>
        
                    <div>
                        <h1 class="font-semibold text-base mb-3">Total Passwords</h1>
                        <p class="text-base">{{$total_passwords}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="layout-content-container flex flex-col flex-1">
            <div class="py-3 @container">
                <div class="shadow-2xl overflow-hidden rounded-xl border border-[#e0dce5] bg-white">
                  @if (count($passwords) > 0)                      
                    <table class="flex-1">
                      <thead>
                        <tr class="bg-white">
                          <th class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-56 px-4 py-3 text-left text-[#141118] w-14 text-sm font-semibold leading-normal">
                            Platform
                          </th>
                          <th class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-176 px-4 py-3 text-left text-[#141118] w-[400px] text-sm font-semibold leading-normal">
                            Platform URL
                          </th>
                          <th class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-536 px-4 py-3 text-left text-[#141118] w-[400px] text-sm font-semibold leading-normal">
                            Platform Password
                          </th>
                          <th class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-296 px-4 py-3 text-left text-[#141118] w-60 text-sm font-semibold leading-normal">
                            Created At
                          </th>
                          {{-- <th class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-416 px-4 py-3 text-left text-[#141118] w-[400px] text-sm font-medium leading-normal">
                            Updated At
                          </th> --}}
                          <th class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-416 px-4 py-3 text-left text-[#141118] w-[400px] text-sm font-medium leading-normal">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($passwords as $password)
                            <tr class="border-t border-t-[#e0dce5]">
                              <td class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-176 h-[72px] px-4 py-2 w-[400px] text-[#756388] text-sm font-normal leading-normal">
                                {{$password -> platform_name}}
                              </td>
                              <td class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-176 h-[72px] px-4 py-2 text-[#756388] text-sm font-normal leading-normal">
                                {{$password -> platform_url}}
                              </td>
                              <td class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-176 h-[72px] px-4 py-2 text-[#756388] text-sm font-normal leading-normal flex items-center justify-start gap-3">
                                ******
                                <button type="button" wire:click="copyToClipboard({{$password}})">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 -mt-1 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                                  </svg>                              
                                </button>
                              </td>
                              <td class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-176 h-[72px] px-4 py-2 text-[#756388] text-sm font-normal leading-normal whitespace-nowrap">
                                {{$password -> created_at}}
                              </td>
                              {{-- <td class="table-a6125b10-cf26-461f-b369-86905b98f49b-column-176 h-[72px] px-4 py-2 w-[400px] text-[#756388] text-sm font-normal leading-normal">
                                {{$password -> updated_at}}
                              </td> --}}
                              <td class="flex items-center text-center pt-4 pl-5 gap-2">
                                <button data-bs-toggle="modal" data-bs-target="#updatePasswordModal" type="button" wire:click="editPassword({{$password->id}})">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                  </svg>
                                </button>
            
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deletePasswordModal" type="button" wire:click="deletePassword({{$password->id}})">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                  </svg>  
                                </button>                                      
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else
                      <div class="p-24 flex items-center justify-center">
                        No Record Found
                      </div>
                  @endif
                  
                  <div class="px-3 py-3 flex justify-end gap-3">
                    {{ $passwords->links() }}
                  </div>
                </div>
          
                <style>
                  @container(max-width:56px){.table-a6125b10-cf26-461f-b369-86905b98f49b-column-56{display: none;}}
                  @container(max-width:176px){.table-a6125b10-cf26-461f-b369-86905b98f49b-column-176{display: none;}}
                  @container(max-width:296px){.table-a6125b10-cf26-461f-b369-86905b98f49b-column-296{display: none;}}
                  @container(max-width:416px){.table-a6125b10-cf26-461f-b369-86905b98f49b-column-416{display: none;}}
                  @container(max-width:536px){.table-a6125b10-cf26-461f-b369-86905b98f49b-column-536{display: none;}}
                  @container(max-width:656px){.table-a6125b10-cf26-461f-b369-86905b98f49b-column-656{display: none;}}
                </style>
            </div>
          </div>
    </div>

    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#passwordModal">
                                Add New Password
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Platform</th>
                                    <th>Platform URL</th>
                                    <th>Platform Password</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($passwords as $password)
                                    <tr>
                                        <td>{{ $password -> platform_name }}</td>
                                        <td>{{ $password -> platform_url }}</td>
                                        <td>******</td>
                                        <td>{{ $password -> created_at }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updatePasswordModal" wire:click="editPassword({{$password->id}})" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deletePasswordModal" wire:click="deletePassword({{$password->id}})" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $passwords->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
