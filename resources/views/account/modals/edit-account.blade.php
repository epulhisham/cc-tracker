<div
  x-show="openEdit"
  x-cloak
  x-transition.opacity
  @click.self="openEdit = false"
  @keydown.escape.window="openEdit = false"
  class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
>
  <div x-transition.scale class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
      <h2 class="text-lg font-semibold mb-4">Edit Account</h2>

      <form
          method="POST"
          x-bind:action="selectedAccount ? '{{ url('/accounts') }}/' + selectedAccount.id : '#'"
          class="space-y-4"
      >
          @csrf
          @method('PUT')

          <div>
              <label class="block font-medium text-gray-700">Account Name</label>
              <input
                  name="name"
                  type="text"
                  x-model="selectedAccount.name"
                  class="mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                  required
              />
          </div>

          <div class="flex justify-end gap-3 pt-4">
              <button type="button" @click="openEdit = false" class="px-4 py-2 rounded-md border">
                  Cancel
              </button>

              <button type="submit" class="px-4 py-2 rounded-md bg-slate-900 text-white hover:bg-slate-800">
                  Update
              </button>
          </div>
      </form>
  </div>
</div>
