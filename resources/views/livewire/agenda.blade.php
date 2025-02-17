<div>
    <x-slot:cabecalho>
        AGENDA
    </x-slot:cabecalho>

    <div class="grid grid-cols-1 gap-2 lg:grid-cols-3 lg:gap-4 lg:mt-6 sm:mt-4">

        <div class="p-2 sm:p-2 lg:p-6 lg:col-span-1">
            <div class="items-center">
                <div>
                    <livewire:calendario></livewire:calendario>
                </div>
            </div>
        </div>

        <div class=" lg:col-span-2 gap-0">

                <div>
                    <livewire:compromissos key="compromissos"></livewire:compromissos>
                </div>

        </div>

    </div>







</div>
