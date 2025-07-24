@auth()
    @if($human)
        <div class="col-sm">
            <button id="copyButton" class="btn btn-outline-success">
                <i class="bi bi-copy"></i>
            </button>
            @isset($shareTreeLink->link)
                <label for="copyText"></label>
                <input
                    type="text"
                    hidden="hidden"
                    id="copyText" class="form-control"
                    value="{{ env('APP_URL') }}/rodovoe-drevo/{{$human->id}}/{{ $shareTreeLink->link }}"
                    readonly
                >
            @endisset
        </div>
    @endif
@endauth
