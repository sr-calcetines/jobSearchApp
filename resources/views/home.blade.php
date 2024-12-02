@extends('layouts.app')
@section('content')

    <div class="tableOffer">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Enterprise</th>
                    <th>Position</th>
                    <th>State</th>
                    <th>Show</th>
                    <th>News</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <td>{{ $offer->id}}</td>
                        <td>{{ $offer->created_at->format('d/m/y')}}</td>
                        <td>{{ $offer->updated_at->format('d/m/y')}}</td>
                        <td>{{ $offer->enterprise}}</td>
                        <td>{{ $offer->position}}</td>
                        <td> 
                            @if ($offer->state===1)
                            <span class="active">In progress</span>
                            @else
                            <span class="inactive">Finished</span>
                            @endif
                        </td>
                        <td><a href="/show/{{$offer->id}}">✏️</a></td>
                        <td>
                            @forelse ($offer->follows as $follow)
                                <li>{{ $follow-> news}}</li>
                            @empty
                                <li>⚠️ No tracking yet ⚠️</li>
                            @endforelse
                        </td>
                    </tr>
                @endforeach
            <tbody>
        </table>
    </div>
@endsection