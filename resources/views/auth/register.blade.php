@extends('layouts.auth')
@section('children')
    <div class="relative min-h-screen h-full flex justify-center flex-col items-end w-full image-translate bg-cover bg-left" 
        style="background-image: 
        linear-gradient(115deg, transparent 50%, #fff 50%), 
        url('{{asset('images/lock-bg.jpg')}}');"
    >
        <img class="absolute left-5 top-5 w-[250px]" src="{{asset('images/logo-white.png')}}"/>
        <div class="w-[50%] pl-28 pt-16">
            <form method="POST" action="/api/register" class=" flex justify-center flex-col gap-5 items-center">
                @csrf
                
                <div class="w-[400px]">
                    <p class="font-bold text-2xl border-b-4 pb-1 border-yellow-400 inline">Create Account</p>
                </div>

                <div class="mt-3">
                    <p class="text-skin-text text-base font-semibold leading-normal mb-2">
                        Username
                    </p>
                    <input
                        type="text"
                        name="username"
                        placeholder="Enter your username"
                        class="shadow-lg form-input text-sm flex w-[400px] min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:border-yellow-400 focus:border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal"
                        value="{{old('username')}}"
                    />
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div>
                    <p class="text-skin-text text-base font-semibold leading-normal mb-2">
                        Email
                    </p>
                    <input
                        type="email"
                        placeholder="Enter your email"
                        class="shadow-lg form-input text-sm flex w-[400px] min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:border-yellow-400 focus:border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal"
                        name="email"
                        value='{{old('email')}}'
                    />
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div>
                    <p class="text-skin-text text-base font-semibold leading-normal mb-2">
                        Password
                    </p>
                    <input
                        id="password-input"
                        type="password"
                        placeholder="Enter your password"
                        class="shadow-lg form-input text-sm flex w-[400px] min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:border-yellow-400 focus:border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal"
                        name="password"
                        value='{{old('password')}}'
                    />
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="w-[400px] flex items-center gap-2 text-sm">
                    <input type="checkbox" id="password-checkbox">
                    <p>Show Password</p>
                </div>

                <div class="flex flex-col gap-2 w-[400px] mt-5">
                    <button type="submit" class="shadow-xl flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-xl h-14 px-4 bg-yellow-400 text-white hover:bg-white hover:text-yellow-400 duration-150 ease-in text-sm font-semibold leading-normal tracking-[0.015em]">
                        <span class="truncate">Create Account</span>
                    </button>

                    <a href="/login" class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-xl h-14 px-4 bg-skin-bg text-skin-text text-sm font-semibold leading-normal tracking-[0.015em]">
                        <span class="truncate">Already have an account? Login</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#password-checkbox').on('change', function(){
                $('#password-input').attr('type',$('#password-checkbox').prop('checked')==true?"text":"password"); 
            });
        });
    </script>
@endsection