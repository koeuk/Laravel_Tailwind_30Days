<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create New User</h2>
                <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicl.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="first_name" id="first_name" required/>
                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="last_name" id="last_name" required></x-form-input>
                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="email" id="email" type="email" required></x-form-input>
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="password" id="password" type="password" required></x-form-input>
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="password_confirmation" id="password_confirmation" type="password" required></x-form-input>
                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a  href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                    <x-form-button>Register</x-form-button>
                </div>
            </div>
    </form>
</x-layout>
