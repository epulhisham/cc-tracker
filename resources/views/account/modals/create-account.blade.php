<div x-show="openCreate" x-cloak x-transition.opacity @click.self="openCreate = false"
    @keydown.escape.window="openCreate = false" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div x-transition.scale class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-lg font-semibold mb-4">Create Account</h2>

        <form method="POST" action="{{ route('accounts.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-medium text-gray-700">
                    Account Name
                </label>
                <input id="name" name="name" type="text"
                    class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    value="{{ old('name') }}" placeholder="e.g. Maybank CC" required autofocus />

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-row gap-6">
                <div>
                    <label for="primary_color" class="block font-medium text-gray-700">
                        Primary Color
                    </label>
                    <input id="primary_color" name="primary_color" type="color"
                        class="mt-1 w-10 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        value="{{ old('primary_color', '#FFFFFF') }}" required autofocus />

                    @error('primary_color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="secondary_color" class="block font-medium text-gray-700">
                        Secondary Color
                    </label>
                    <input id="secondary_color" name="secondary_color" type="color"
                        class="mt-1 w-10 rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        value="{{ old('secondary_color', '#000000') }}" required autofocus />

                    @error('secondary_color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" @click="openCreate = false" class="px-4 py-2 rounded-md border">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
