@props(['name', 'label', 'options', 'selected' => '', 'required' => false])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select 
        class="form-control @error($name) is-invalid @enderror" 
        id="{{ $name }}" 
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
    >
        <option value="">Select {{ $label }}</option>
        @foreach($options as $value => $optionLabel)
            <option value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>