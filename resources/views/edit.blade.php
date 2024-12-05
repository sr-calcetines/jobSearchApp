@extends('layouts.app')
@section('content')

    <div class="backBtnContainer">
        <a href="{{ route('home') }}" class="backBtn">🔙</a>
    </div>

    <div class="tableOffer">
        <h2 class="form-title">Edit Offer</h2>
        <form action="{{ route('update', $offer->id) }}" method="POST" class="form-container">

        @csrf

            <div class="form-group">
                <label for="enterprise" class="form-label">Enterprise</label>
                <input type="text" name="enterprise" id="enterprise" class="form-input" required placeholder="{{ $offer->enterprise}}">
            </div>

            <div class="form-group">
                <label for="position" class="form-label">Position</label>
                <input type="text" name="position" id="position" class="form-input" required placeholder="{{ $offer->position}}">
            </div>

            <div class="form-group">
                <label for="state" class="form-label">State</label>
                <select name="state" id="state" class="form-select" required>
                    <option value="1">In progress</option>
                    <option value="0">Finished</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="form-button">Edit Offer</button>
            </div>

        </form>
    </div>
@endsection
