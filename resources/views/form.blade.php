<form method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="profession" placeholder="Profession">
    <input type="text" name="company" placeholder="Company">
    <input type="text" name="location" placeholder="Location">
    <button type="submit">Search</button>
</form>

@if(!empty($results))
    <h2>Search Results:</h2>
    <ul>
        @foreach($results as $result)
            <li style="margin-bottom: 20px;">
                <strong>{{ $result['title'] }}</strong><br>
                <a href="{{ $result['link'] }}" target="_blank">{{ $result['link'] }}</a><br>
                <p>{{ $result['snippet'] }}</p>
                @if($result['image'])
                    <img src="{{ $result['image'] }}" alt="thumbnail" width="150">
                @endif
            </li>
        @endforeach
    </ul>
@endif
