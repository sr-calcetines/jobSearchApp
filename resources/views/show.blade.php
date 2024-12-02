@extends('layouts.app')
@section('content')

    <div class="backBtnContainer">
        <a href="{{ route('home') }}" class="backBtn">🔙</a>
    </div>

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
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $offers->id}}</td>
                        <td>{{ $offers->created_at->format('d/m/y')}}</td>
                        <td>{{ $offers->updated_at->format('d/m/y')}}</td>
                        <td>{{ $offers->enterprise}}</td>
                        <td>{{ $offers->position}}</td>
                        <td>{{ $offers->state}}</td>
                    </tr>
            <tbody>
        </table>
    </div>
@endsection