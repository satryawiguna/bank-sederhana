@props(['value', 'isRequired' => false])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
    @if($isRequired)
        <span class="required">*</span>
    @endif
</label>
