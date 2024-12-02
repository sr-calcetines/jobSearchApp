@extends('layouts.app')
@section('content')

    <div class="backBtnContainer">
        <a href="{{ route('home') }}" class="backBtn">🔙</a>
    </div>

    <div class="tableOffer">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th></th>Created at</th>
                    <th>Updated at</th>
                    <th>Enterprise</th>
                    <th>Position</th>
                    <th>State</th>
                    <th>News</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $offers->id}}</td>
                        <td>{{ $offers->created_at->format('d/m/y')}}</td>
                        <td>{{ $offers->updated_at->format('d/m/y')}}</td>
                        <td>{{ $offers->enterprise}}</td>
                        <td>{{ $offers->position}}</td>
                        <td> 
                            @if ($offers->state===1)
                            <span class="active">In progress</span>
                            @else
                            <span class="inactive">Finished</span>
                            @endif
                        </td>
                        <td>
                            @forelse ($offers->follows as $follow)
                                <li>{{ $follow-> news}}</li>
                            @empty
                                <li>⚠️ No tracking yet ⚠️</li>
                            @endforelse
                        </td>
                    </tr>
            <tbody>
        </table>
    </div>
@endsection