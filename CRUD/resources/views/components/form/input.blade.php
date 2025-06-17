@props(['name', 'label', 'type' => 'text', 'hint', 'value' => ''])

<div class="mb-3">
    {{-- @dump($label) --}}
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name ="{{ $name }}" id ="{{ $name }}"
        @isset($hint)
    placeholder="{{ $hint }}"
    @endisset
        class ="form-control @error($name)is-invalid @enderror" value={{ old($name, $value) }}>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>
