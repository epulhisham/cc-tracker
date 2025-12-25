@props([
    'type' => 'success', // success | error | info
    'message' => null,
    'duration' => 2500,
])

@php
    $sessionKey = match ($type) {
        'error' => 'error',
        'info' => 'info',
        default => 'success',
    };

    $msg = $message ?? session($sessionKey);

    $icon = match ($type) {
        'error' => 'M10 18a8 8 0 100-16 8 8 0 000 16zm3-11a1 1 0 10-2 0v4a1 1 0 102 0V7zm-1 8a1.25 1.25 0 100-2.5A1.25 1.25 0 0012 15z',
        default => 'M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z',
    };

    $title = match ($type) {
        'error' => 'Error',
        'info' => 'Info',
        default => 'Success',
    };

    $iconClass = match ($type) {
        'error' => 'text-red-600',
        'info' => 'text-blue-600',
        default => 'text-green-600',
    };
@endphp

@if ($msg)
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, {{ (int) $duration }})"
        x-show="show"
        x-transition.opacity
        x-cloak
        class="fixed top-6 right-6 z-50"
    >
        <div class="flex items-start gap-3 rounded-lg bg-green-200 border border-green-700 shadow-lg ring-1 ring-black/5 px-4 py-3">
            <div class="mt-0.5">
                <svg class="h-5 w-5 {{ $iconClass }}" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="{{ $icon }}" clip-rule="evenodd"/>
                </svg>
            </div>

            <div class="text-sm">
                <p class="font-medium text-slate-900">{{ $title }}</p>
                <p class="text-slate-600">{{ $msg }}</p>
            </div>

            <button
                type="button"
                @click="show = false"
                class="ml-2 text-slate-400 hover:text-slate-600"
                aria-label="Close"
            >
                ✕
            </button>
        </div>
    </div>
@endif
