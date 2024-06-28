@props(['name', 'label', 'value' => '', 'required' => false])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea 
        class="form-control @error($name) is-invalid @enderror" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        rows="3"
        {{ $required ? 'required' : '' }}
    >{{ old($name, $value) }}</textarea>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>