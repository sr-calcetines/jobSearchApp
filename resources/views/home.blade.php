@extends('layouts.app')
@section('content')

    <div class="tableOffer">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Enterprise</th>
                    <th scope="col">Position</th>
                    <th scope="col">State</th>
                    <th scope="col">Show</th>
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
                        <td>{{ $offer->state}}</td>
                        <td><a href="/show/{{$offer->id}}">✏️</a></td>
                    </tr>
                @endforeach
            <tbody>
        </table>
    </div>
@endsection