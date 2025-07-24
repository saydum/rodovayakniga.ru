<div class="col pb-3">
    @if($type !== 'hidden')
        <label class="pb-1" for="{{ $name }}">{{ $title }}</label>
    @endif

    @if($type === 'select')
        <select id="{{ $name }}" name="{{ $name }}" class="form-select">
            <option value="">Выберите</option>
            @foreach($options as $key => $label)
                <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    @elseif($type === 'textarea')
        <textarea
            id="{{ $name }}"
            name="{{ $name }}"
            class="form-control"
            placeholder="{{ $placeholder }}"
        >{{ $value }}</textarea>
    @else
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            class="form-control"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}"
        >
    @endif
</div>
