@extends('admin.auth.Layout.app')
@section('content')
    <div>
        <h1 class="w3-center">Add Student to Access</h1>
        <br />
        <form class="w3-padding-4" method="POST" style="width: 94%">
            @csrf
            <div>
                <input class="w3-input" name="matric" placeholder="Enter Matric Number" required />
                <label class="w3-label w3-validate">matric</label>
            </div>
            <br />

            <div>
                <input class="w3-input" name="password" type="password" placeholder="Enter Password" required />
                <label class="w3-label w3-validate">password</label>
            </div>
            <br />

            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="w3-btn w3-btn-block w3-center w3-round w3-blue">Add</button>
            </div>
        </form>
    </div>
@endsection
