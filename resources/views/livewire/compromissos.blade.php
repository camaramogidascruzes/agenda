<div>
    <div class="text-center text-3xl font-bold pb-4">{{ $data_selecionada }}</div>

    @if (isset($data) && count($data) > 0)
        @foreach($data as $compromisso)
            <div class="grid grid-cols-4 p-2 gap-2 lg:grid-cols-4 sm:mt-4">
                <div class="rounded-xl bg-white p-2 ring-1  sm:p-2 lg:p-4 col-span-1 text-center">
                    <div class="font-bold text-xl">{{ $compromisso->hora }}</div>
                </div>
                <div class="rounded-xl bg-white p-2 ring-1  sm:p-2 lg:p-4 col-span-3">
                    <div class="font-bold mb-2 text-xl">{{ $compromisso->tipo->nome }}</div>
                    <div class="mb-2"><div class="font-bold">Assunto:</div> {{ $compromisso->assunto }}</div>
                    <div><div class="font-bold">Local:</div> {{ $compromisso->local }}</div>
                    @if(strlen($compromisso->descricao) > 0 )
                        <hr class="mt-2">
                        <div class="m-2">{!! $compromisso->descricao !!}</div>
                        <hr class="mt-2">
                    @endif
                    @if(strlen($compromisso->participantes) > 0 )
                        <div class="mb-1 mt-2 font-bold">Participantes: </div>
                        <div class="m-2">
                            <div>{!!  $compromisso->participantes !!}</div>
                        </div>
                    @endif

                </div>
            </div>
        @endforeach
    @else
        <div class="rounded-xl bg-white p-2 ring-1  sm:p-2 lg:p-4 mt-10">
            <h1>Nenhum compromisso para o dia!</h1>
        </div>
    @endif


</div>
