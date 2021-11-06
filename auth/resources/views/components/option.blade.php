@props(['value', 'selected'])
<option {{ $value === $selected ? 'selected': '' }} value="{{ $value }}">{{ $slot }}</option>