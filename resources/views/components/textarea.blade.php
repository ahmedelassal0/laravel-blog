@props(['label', 'err'])
<div class="flex flex-col gap-2">
    <label class="font-semibold" for="{{ $attributes['name']?? '' }}">
        {{ $label?? '' }}
    </label>
    <textarea
{{ $attributes(['name' => '']) }}
            {{$attributes(['class'  => "flex-grow focus:outline-none focus:ring rounded p-3 focus:outline-none ring ring-gray-100 focus:ring-blue-500"])}}
            {{ $attributes(['plceholder' => '']) }}
>
    {{ $slot }}
</textarea>
    @error($err)
    <p class="text-sm text-red-500">
        {{ $message }}
    </p>
    @enderror
</div>
