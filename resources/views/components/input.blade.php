@props(['err'])
<div class="flex flex-col gap-2">
    <label class="font-semibold " for="{{ $attributes['name']?? '' }}">
        {{ $slot }}
    </label>
    <input
    {{ $attributes }}"
    {{ $attributes(['class' => 'focus:outline-none ring ring-gray-100 focus:ring-blue-500 rounded p-2']) }}
    {{ $attributes }}
    type="{{ $attributes['type']?? 'text' }}"
    >
    @error($err?? false)
    <p class="text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
