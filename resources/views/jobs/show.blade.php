<x-layout>
    <x-slot:heading>
        Job Description
    </x-slot:heading>

    <ul>
        <li><strong>Job ID:</strong> {{$job->id}}</li>
        <li><strong>Job Title:</strong> {{$job->title}}</li>
        <li><strong>Salary:</strong> {{$job->salary}}</li>
    </ul>

    @can('edit-job', $job)
        <div class="py-3">
            <x-button href="/jobs/{{$job->id}}/edit">Edit</x-button>
        </div>
    @endcan
</x-layout>
