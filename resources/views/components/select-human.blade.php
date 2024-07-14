<div class="col pb-3">
    <div class="form-group">
        <label class="pb-1">{{ $title }}</label>
        <select name="{{ $inputName }}" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option
                selected="selected"
                data-select2-id="0"
            >
                Не выбран
            </option>

            @isset($human->father, $human->mother)
                <option
                    selected="selected"
                    value="{{ $value }}"
                    data-select2-id="{{ $value }}"
                >
                    {{ $name . ' ' . $lastname .' '. $surname }}
                </option>
            @endisset

            @foreach($humans as $human)
                <option
                    value="{{ $human->id }}"
                    data-select2-id="{{ $human->id }}"
                >
                    {{ $human->name . ' ' . $human->last_name .' '. $human->surname }}
                </option>
            @endforeach
        </select>
    </div>
</div>
