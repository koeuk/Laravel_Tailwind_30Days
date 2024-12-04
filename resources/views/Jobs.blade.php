<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="hover:underline">
                    <strong>{{ $job['title'] }} :</strong> Pay{{ $job['salary'] }} per year
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>

