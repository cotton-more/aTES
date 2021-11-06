<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($clients as $client)
                        <h3>{{ $client->name }} ({{$client->id}})</h3>
                        <p>{{ $client->redirect }}</p>
                        <p>{{ $client->secret }}</p>
                    @endforeach
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/oauth/clients" method="POST">
                        @csrf
                        <div>
                            <x-label>Name</x-label>
                            <x-input type="text" name="name"></x-input>
                        </div>
                        <div>
                            <x-label>Redirect</x-label>
                            <x-input type="text" name="redirect"></x-input>
                        </div>
                        <div class="mt-4">
                            <x-button type="submit">Create</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
