<x-app-layout>

    <x-admin.header>{{ __('Tasks') }} @if(isset($task)): {{ $task->name }}@endif</x-admin.header>

    <x-admin.errors/>

    @if(isset($task))
        <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}">
            @else
                <form action="{{ route('admin.tasks.store') }}" method="POST">
                    @csrf
                    @endif

                    <x-admin.form.input-text name="name" value="{{ old('name', $task->name ?? '') }}">{{ __('Name') }}</x-admin.form.input-text>
                    <x-admin.form.input-text name="description" value="{{ old('description', $task->description  ?? '') }}">{{ __('Description') }}</x-admin.form.input-text>


                    <x-admin.form.input-text type="datetime" name="due_at" value="{{ old('due_at', isset($task) ? $task->due_at->format('Y-m-d') : '') }}">{{ __('Started at') }}</x-admin.form.input-text>

                    <x-admin.form.input-checkbox name="done" value="{{ old('done', $task->done) }}">{{ __('Done') }}</x-admin.form.input-checkbox>

                    @if($task->done)
                        <x-admin.button disabled class="hover:cursor-not-allowed">{{ __('Save') }}</x-admin.button>
                        <p class="inline text-slate-400 ml-2">The task is done. It cannot be edited.</p>
                    @else
                        <x-admin.button>{{ __('Save') }}</x-admin.button>
                    @endif
                </form>

</x-app-layout>
