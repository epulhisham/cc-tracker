<x-app-layout>
    <div x-data="{
        openCreate: {{ $errors->any() ? 'true' : 'false' }},
        openEdit: false,
        openDelete: false,
        mode: null, // 'edit' | 'delete'
        selectedAccount: null,
    }" class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-toast />

        <div class="flex col justify-end gap-4">
            <button @click="openCreate = true" class="font-medium text-blue-600 hover:underline">
                Create
            </button>
            @include('account.modals.create-account')
            <button @click="mode = mode === 'edit' ? null : 'edit'" class="font-medium text-slate-600 hover:underline">
                Edit
            </button>
            @include('account.modals.edit-account')
            <button @click="mode = mode === 'delete' ? null : 'delete'" class="font-medium text-red-600 hover:underline">
                Delete
            </button>
            @include('account.modals.delete-account')
        </div>
        <div class="flex flex-col lg:flex-row gap-6 flex-wrap mt-10">
            @forelse ($accounts as $acc)
                <div class="flex flex-row justify-between p-4 sm:p-8 border sm:rounded-lg min-w-[320px] max-w-[320px]"
                    style="
                    background-color: {{ $acc->primary_color }};
                    color: {{ $acc->secondary_color }};
                    border-color: {{ $acc->secondary_color }};
                    ">
                    <h1 class="font-medium text-lg">
                        {{ $acc->name }}
                    </h1>

                    <div class="flex flex-row gap-2">
                        <button x-cloak x-show="mode === 'edit'"
                            @click="openEdit = true; selectedAccount = @js(['id' => $acc->id, 'name' => $acc->name, 'primaryColor' => $acc->primary_color, 'secondaryColor' => $acc->secondary_color ])"
                            class="font-medium hover:underline"
                            color: {{ $acc->secondary_color }};
                            >
                            Edit
                        </button>

                        <button x-cloak x-show="mode === 'delete'"
                            @click="openDelete = true; selectedAccount = @js(['id' => $acc->id, 'name' => $acc->name])"
                            class="font-medium hover:underline"
                            color: {{ $acc->secondary_color }};
                            >
                            Delete
                        </button>
                    </div>
                </div>
            @empty
                <div class="text-slate-600">
                    No accounts yet. Click <span class="text-blue-600 font-medium">Create</span> to add one.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
