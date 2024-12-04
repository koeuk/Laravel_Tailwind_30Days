<x-layout>
    <x-slot:heading>
        Job Details!
    </x-slot:heading>

    @if($job)
        <ul>
            <h2 class="font-bold text-lime-700">{{ $job['title'] }}</h2>
            <p>{{ $job['salary'] }}</p>
        </ul>
    @else
        <p>Job not found.</p>
    @endif
</x-layout>
