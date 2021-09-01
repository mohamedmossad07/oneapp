<ul>
    @foreach($locations as $location)
        <li>latitude: {{$location->latitude}} >>> longitude: {{$location->longitude}}</li>
    @endforeach
</ul>
