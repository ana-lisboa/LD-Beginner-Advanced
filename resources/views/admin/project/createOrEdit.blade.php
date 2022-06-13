<x-app-layout>

    <x-admin.header>{{ __('Projects') }} @if(isset($project)): {{ $project->name }}@endif</x-admin.header>

    <x-admin.errors/>

    @if(isset($project))
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $project->id }}">
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
    @endif

            <x-admin.form.input-text name="name" value="{{ old('name', $project->name ?? '') }}">{{ __('Name') }}</x-admin.form.input-text>
            <x-admin.form.input-text name="description" value="{{ old('description', $project->description  ?? '') }}">{{ __('Description') }}</x-admin.form.input-text>
            <div class="flex flex-row">
                <x-admin.form.input-text groupClass="w-1/2 mr-2" type="date" name="started_at" value="{{ old('started_at', isset($project) ? $project->started_at->format('Y-m-d') : '') }}">{{ __('Started at') }}</x-admin.form.input-text>
                <x-admin.form.input-text groupClass="w-1/2 ml-2" type="date" name="ended_at" value="{{ old('ended_at', isset($project) && $project->ended_at ? $project->ended_at->format('Y-m-d') : '') }}" pattern="\d{4}-\d{2}-\d{2}">{{ __('Ended at') }}</x-admin.form.input-text>
            </div>

            <x-admin.button>{{ __('Save') }}</x-admin.button>
    </form>

</x-app-layout>
