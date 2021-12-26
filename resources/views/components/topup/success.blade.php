@props(['success'])

@if ($success)
    <div {{ $attributes }}>
        <div class="mt-3 list-disc list-inside text-sm text-green-600">
            {{ $success }}
        </div>
    </div>
@endif
