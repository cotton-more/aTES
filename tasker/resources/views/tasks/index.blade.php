<x-app-layout>
    <section>
        <table class="table">
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        @if($task->notCompleted())
                        <a href="{{ route('tasks.complete', $task) }}" class="button is-link">
                            Complete
                        </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
</x-app-layout>