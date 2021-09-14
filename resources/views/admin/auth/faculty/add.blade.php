@extends('admin.auth.Layout.app')
@section('content')
    <div>
        <h1 class="w3-center">Create Faculty</h1>
        <br />
        <form class="w3-padding-4" method="POST" style="width: 94%">
            @csrf
            <input class="w3-input" name="f_name" placeholder="Enter Faculty Name" required />
            <br />
            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="w3-btn w3-btn-block w3-center w3-round w3-blue">Create</button>
            </div>
        </form>
    </div>
@endsection
