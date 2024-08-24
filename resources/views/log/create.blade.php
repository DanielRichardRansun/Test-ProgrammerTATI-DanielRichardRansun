<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Log Harian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('log.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" required autofocus />
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>
                        
                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
