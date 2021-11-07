<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3>Change role for user: {{ $user->name }}</h3>
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method("PATCH")
                <div>
                    <select name="role">
                        <option value="">-</option>
                        @foreach($roles as $role)
                        <x-option :selected="$user->role" :value="$role">{{ $role }}</x-option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <x-button>save</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
