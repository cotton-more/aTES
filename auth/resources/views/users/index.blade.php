<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="w-full">
                <tbody>
                @foreach($users as $user)
                <tr class="hover:bg-green-300">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role ?? '-' }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
