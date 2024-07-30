<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="studentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content !w-[600px]">
            <div class="modal-header">
                <h5 class="modal-title font-bold text-lg" id="studentModalLabel">Create Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="savePassword">
                <div class="modal-body px-4">
                    <div class="mb-4">
                        <label class="text-skin-text text-base font-semibold leading-normal mb-2">Platform / Website Name </label>
                        <input type="text" wire:model="platform_name" placeholder="Enter platform name" class="shadow-md text-sm flex w-full flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:!border-yellow-400 focus:!border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal">
                        @error('platform_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="text-skin-text text-base font-semibold leading-normal mb-2">Platform / Website URL</label>
                        <input type="text" wire:model="platform_url" placeholder="Enter platform URL" class="shadow-md text-sm flex w-full flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:!border-yellow-400 focus:!border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal">
                        @error('platform_url') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="text-skin-text text-base font-semibold leading-normal mb-2">Password</label>
                        <input type="{{$password_type}}" wire:model="platform_password" placeholder="Enter your password" class="shadow-md text-sm flex w-full flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:!border-yellow-400 focus:!border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal">
                        @error('platform_password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="button" wire:click="togglePassword" class="w-[400px] flex items-center gap-2 text-sm">
                        <input type="checkbox" wire:model="password_checkbox">
                        <p>Show Password</p>
                    </button>
                </div>
                <div class="modal-footer px-4">
                    <button type="button" data-bs-dismiss="modal" wire:click="closeModal" class="flex w-auto cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-8 bg-skin-bg text-skin-text text-sm font-semibold leading-normal tracking-[0.015em]">
                        <span class="truncate">Cancel</span>
                    </button>
            
                    <button type="submit" class="shadow-xl flex w-auto cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-8 bg-yellow-400 text-white hover:bg-white hover:!text-yellow-400 duration-150 ease-in text-sm font-semibold leading-normal tracking-[0.015em]">
                        <span class="truncate">Proceed</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Student Modal -->
<div wire:ignore.self class="modal fade" id="updatePasswordModal" tabindex="-1" aria-labelledby="updateStudentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content !w-[600px]">
            <div class="modal-header">
                <h5 class="modal-title font-bold text-lg" id="updateStudentModalLabel">Update Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updatePassword">
                <div class="modal-body px-4">
                    <div class="mb-4">
                        <label class="text-skin-text text-base font-semibold leading-normal mb-2">Platform / Website Name </label>
                        <input type="text" wire:model="platform_name" placeholder="Enter platform name" class="shadow-md text-sm flex w-full flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:!border-yellow-400 focus:!border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal">
                        @error('platform_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="text-skin-text text-base font-semibold leading-normal mb-2">Platform / Website URL</label>
                        <input type="text" wire:model="platform_url" placeholder="Enter platform URL" class="shadow-md text-sm flex w-full flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:!border-yellow-400 focus:!border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal">
                        @error('platform_url') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="text-skin-text text-base font-semibold leading-normal mb-2">Password</label>
                        <input type="{{$password_type}}" wire:model="platform_password" placeholder="Enter your password" class="shadow-md text-sm flex w-full flex-1 resize-none overflow-hidden rounded-xl text-skin-text focus:outline-0 focus:ring-0 border border-gray-300 bg-skin-bg focus:!border-yellow-400 focus:!border-2 h-14 placeholder:text-[#60778a] p-4 font-normal leading-normal">
                        @error('platform_password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-auto inline-flex items-center gap-2 text-sm">
                        <button type="button" wire:click="togglePassword">
                            <input wire:model="password_checkbox" type="checkbox">
                        </button>
                        <p>Show Password</p>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" data-bs-dismiss="modal" wire:click="closeModal" class="flex w-auto cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-8 bg-skin-bg text-skin-text text-sm font-semibold leading-normal tracking-[0.015em]">
                        <span class="truncate">Cancel</span>
                    </button>
            
                    <button type="submit" class="shadow-xl flex w-auto cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-8 bg-yellow-400 text-white hover:bg-white hover:!text-yellow-400 duration-150 ease-in text-sm font-semibold leading-normal tracking-[0.015em]">
                        <span class="truncate">Proceed</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Student Modal -->
<div wire:ignore.self class="modal fade" id="deletePasswordModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content !w-[600px]">
            <div class="modal-header">
                <h5 class="modal-title font-bold text-lg" id="deleteStudentModalLabel">Delete Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyPassword">
                <div class="modal-body px-4">
                    <h4>Are you sure you want to delete this data ?</h4>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" data-bs-dismiss="modal" wire:click="closeModal" class="flex w-auto cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-8 bg-skin-bg text-skin-text text-sm font-semibold leading-normal tracking-[0.015em]">
                        <span class="truncate">Cancel</span>
                    </button>
            
                    <button type="submit" class="shadow-xl flex w-auto cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-8 bg-yellow-400 text-white hover:bg-white hover:!text-yellow-400 duration-150 ease-in text-sm font-semibold leading-normal tracking-[0.015em]">
                        <span class="truncate">Proceed</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>