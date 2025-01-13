<x-layout>
    <x-slot:heading>
        Job Details!
    </x-slot:heading>
    {{-- you can use this condition if you don't want use condition on job.php --}}
    {{-- @if ($job) --}}
    <ul>
        <h2 class="font-bold text-lime-700">{{ $job['title'] }}</h2>
        <p>{{ $job->salary }}</p>
    </ul>
    {{-- @else
        <p>Job not found.</p>
    @endif --}}
    <div class="d-flex">
        <x-button class="mt-10" href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        <button type="button" form="delete-form"
            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-red-500 bg-white border border-gray-300 leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 rounded transition ease-in-out duration-150 dark:bg-gray-200 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800 ">Delete</button>
    </div>
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
