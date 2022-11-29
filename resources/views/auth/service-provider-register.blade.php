<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('serviceprovider.register.post') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="holder_name" :value="__('HolderName')" />

                <x-text-input id="holder_name" class="block mt-1 w-full" type="text" name="holder_name" :value="old('holder_name')" required autofocus />

                <x-input-error :messages="$errors->get('holder_name')" class="mt-2" />
            </div>

            <input type="hidden" value="{{request()->user}}" name="user_id">



            <div class="mt-4">
                <x-input-label for="bank_name" :value="__('BankName')" />

                <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')" required />

                <x-input-error :messages="$errors->get('last_nabank_nameme')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="branch_name" :value="__('BranchName')" />

                <x-text-input id="branch_name" class="block mt-1 w-full" type="text" name="branch_name" :value="old('branch_name')" required />

                <x-input-error :messages="$errors->get('branch_name')" class="mt-2" />
            </div>



            <div class="mt-4">
                <x-input-label for="branch_code" :value="__('BranchCode')" />

                <x-text-input id="mobbranch_codeile" class="block mt-1 w-full" type="text" name="branch_code" :value="old('branch_code')" required />

                <x-input-error :messages="$errors->get('branch_code')" class="mt-2" />
            </div>



            
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="account_number" :value="__('AccountNumber')" />

                <x-text-input id="account_number" class="block mt-1 w-full"
                                type="text"
                                name="account_number"
                                required  />

                <x-input-error :messages="$errors->get('account_number')" class="mt-2" />
            </div>

       
            <div class="flex items-center justify-end mt-4">
            
                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
