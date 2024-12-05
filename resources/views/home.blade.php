@extends('layouts.app')
@section('content')
    <div class="tableOffer">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Enterprise</th>
                    <th scope="col">Position</th>
                    <th scope="col">State</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <td>{{ $offer->created_at}}</td>
                        <td>{{ $offer->enterprise}}</td>
                        <td>{{ $offer->position}}</td>
                        <td>{{ $offer->state}}</td>
                    </tr>
                @endforeach
            <tbody>
        </table>
    </div>
@endsection