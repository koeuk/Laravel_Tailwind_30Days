
@props(['name'])
@error($name)
    <span class="inline-block text-red-500 sm:text-sm/6 mt-1">{{ $message }}</span>
@enderror
