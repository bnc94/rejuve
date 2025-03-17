<x-app-layout>
    <div class="py-0 sm:py-10">
        <div class="max-w-5xl mx-auto pb-8 sm:px-6 lg:px-8 flex justify-center items-center">
            @livewire('inscripcion', ['competencia' => $competencia, 'pruebas' => $pruebas])
        </div>
    </div>
</x-app-layout>