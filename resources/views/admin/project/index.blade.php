<x-app-layout>

    <x-admin.header>{{ __('Projects') }}</x-admin.header>
    <x-admin.buttons>
        <x-admin.button-outline href="{{ route('admin.projects.create') }}">
            {{ __('New project') }}
        </x-admin.button-outline>
    </x-admin.buttons>

    @forelse($projects as $project)
        @if($loop->first)
            <table class="table-auto w-full">
                <thead class="">
                <tr class="border-b text-left">
                    <th class="px-6 py-3">{{ __('Name') }}</th>
                    <th class="px-6 py-3">{{ __('client') }}</th>
                    <th class="px-6 py-3">{{ __('Active') }}</th>
                    <th class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody class="">
                @endif
                <tr class="hover:bg-gray-50 {{ $project->active ? 'text-slate-800' : 'text-slate-400' }}">
                    <td class="px-6 py-3">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="hover:cursor-pointer hover:underline">
                            {{ $project->name }}
                        </a>
                    </td>
                    <td class="px-6 py-3">client name + link</td>
                    <td class="px-6 py-3">@if($project->active) <x-icons.check /> @else <x-icons.cross /> @endif</td>
                    <td class="px-6 py-3">
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="w-40 px-2 py-1 rounded text-sm text-white bg-slate-700 hover:text-slate-200">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="ml-3 px-2 py-1 rounded  text-sm text-slate-600 hover:text-slate-500">Delete</button>
                        </form>
                    </td>
                </tr>

                @if($loop->last)
                </tbody>
            </table>
        @endif
    @empty
        <p>No projects found</p>
    @endforelse

    {{ $projects->links() }}
</x-app-layout>
