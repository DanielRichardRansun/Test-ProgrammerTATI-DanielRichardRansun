<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Hello World Output') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow w-100">
                    {{-- <div class="card-header bg-primary text-white text-center">
                        <h5>{{ __('Generate Hello World Output') }}</h5>
                    </div> --}}
                    <div class="card-body">
                        <form action="{{ route('helloworld') }}" method="GET">
                            <div class="mb-3">
                                <label for="n" class="form-label">Enter a Number:</label>
                                <input type="number" id="n" name="n" value="{{ old('n', $input) }}" min="1" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Generate</button>
                        </form>

                        @if(isset($output))
                            <div class="mt-4">
                                <h4 class="text-center">Output:</h4>
                                <p class="text-center fs-4">{{ implode(' ', $output) }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
