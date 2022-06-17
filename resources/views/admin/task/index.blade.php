<x-app-layout>

    <x-admin.header>{{ __('Tasks') }}</x-admin.header>
    <x-admin.buttons>
        <x-admin.button-outline href="{{ route('admin.tasks.create') }}">
            {{ __('New task') }}
        </x-admin.button-outline>
    </x-admin.buttons>

    @forelse($tasks as $task)
        @if($loop->first)
            <table class="table-auto w-full">
                <thead class="">
                <tr class="border-b text-left">
                    <th class="px-6 py-3">{{ __('Assigned user') }}</th>
                    <th class="px-6 py-3">{{ __('Name') }}</th>
                    <th class="px-6 py-3">{{ __('Done') }}</th>
                    <th class="px-6 py-3">{{ __('Remaining time') }}</th>
                    <th class="px-6 py-3">{{ __('Project') }}</th>
                    <th class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody class="">
                @endif
                <tr class="hover:bg-gray-50 {{ !$task->done ? 'text-slate-800' : 'text-slate-400' }}">
                    <td class="px-6 py-3">
                        <a href="{{ route('admin.tasks.edit', $task->id) }}" class="hover:cursor-pointer hover:underline">
                            {{ $task->name }}
                        </a>
                    </td>
                    <td class="px-6 py-3">assigned user name + link</td>
                    <td class="px-6 py-3">@if($task->done) <x-icons.check /> @else <x-icons.cross /> @endif</td>
                    <td class="px-6 py-3 {{ !$task->done && $task->due_at->lessThan(now()) ? 'text-rose-800' : '' }}">{{ $task->remaining_time }}</td>
                    <td class="px-6 py-3">Project + link </td>
                    <td class="px-6 py-3 w-48">
                        <a href="{{ route('admin.tasks.edit', $task->id) }}" class="w-40 px-2 py-1 rounded text-sm text-white bg-slate-700 hover:text-slate-200">Edit</a>
                        <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST" class="inline-block">
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
        <p>No tasks found</p>
    @endforelse

    {{ $tasks->links() }}
</x-app-layout>
