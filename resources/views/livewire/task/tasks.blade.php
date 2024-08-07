<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
        Manage Tasks
    </h2>
</x-slot>
<div class="p-6 bg-white shadow-lg rounded-lg">
    @if (session()->has('message'))
        <div class="bg-teal-100 border-l-4 border-teal-500 text-teal-900 p-4 mb-4 rounded-lg shadow-md" role="alert">
            <div class="flex">
            <div class="ml-3">
                <p class="text-sm">{{ session('message') }}</p>
            </div>
            </div>
        </div>
    @endif
    <div class="flex justify-between items-center mb-4">
        <button wire:click="create()" class="flex items-center bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded-lg my-3 space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>Create New Task</span>
        </button>

        @if($isOpen)
            @include('livewire.task.create')
        @endif
        <div>
            <label class="font-bold">Filter by:</label>
            <select 
                id="selectedProject"
                wire:model="selectedProject" 
                wire:change = "changeProject"
                class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Select a project"
            >
                <option value="">All projects</option>
                @foreach ($projects as $proj)
                    <option value="{{ $proj['key'] }}">{{ $proj['value'] }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-200 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody wire:sortable="updateTaskOrder" class="bg-white divide-y divide-gray-200">
                @foreach($tasks as $task)
                    <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}" wire:sortable.handle>  
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ getPriority($task->priority) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $task->project }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button wire:click="edit({{ $task->id }})" class="bg-blue-500 hover:bg-blue-600 text-white p-1 rounded-lg transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                            <button wire:click="delete({{ $task->id }})" class="bg-red-500 hover:bg-red-600 text-white p-1 rounded-lg transition ease-in-out duration-150 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
   
</div>