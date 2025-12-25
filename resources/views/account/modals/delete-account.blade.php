<div x-show="openDelete" x-cloak x-transition.opacity @click.self="openDelete = false"
    @keydown.escape.window="openDelete = false" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div x-transition.scale class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-lg font-semibold mb-2">Delete Account</h2>

        <p class="text-sm text-slate-600">
            Are you sure you want to delete
            <span class="font-medium text-slate-900" x-text="selectedAccount?.name"></span>?
        </p>

        <form method="POST" x-bind:action="selectedAccount ? '{{ url('/accounts') }}/' + selectedAccount.id : '#'"
            class="mt-6 flex justify-end gap-3">
            @csrf
            @method('DELETE')

            <button type="button" @click="openDelete = false" class="px-4 py-2 rounded-md border">
                Cancel
            </button>

            <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700">
                Delete
            </button>
        </form>
    </div>
</div>
