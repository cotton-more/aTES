<x-app-layout>
    <section>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea name="description" class="textarea"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Doer</label>
                <div class="control">
                    <div class="select">
                        <select name="doer">
                            <option>-</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Create</button>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>