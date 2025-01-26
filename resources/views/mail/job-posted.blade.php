
<h2>
    {{$job->title}}
</h2>
<p>
    Your job has been posted successfully
</p>
<p>
    {{-- <a href="/jobs/{{$job->id }}">view Your job listing</a> --}}
    <a href="{{url('/jobs/' . $job->id)}}">view Your job listing</a>
</p>
