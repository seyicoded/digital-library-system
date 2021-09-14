@extends('admin.auth.Layout.app')
@section('content')
    <div>
        <h1 class="w3-center">Create Department</h1>
        <br />
        <form class="w3-padding-4" method="POST" style="width: 94%">
            @csrf
            <select name="f_name" class="w3-select w3-round custom-select">
                <option disabled>select faculty</option>
                @foreach ($data['_data'] as $dt)
                    <option value="{{$dt->f_name}}">{{$dt->f_name}}</option>
                @endforeach
            </select>
            <label class="w3-label">Select Faculty</label>
            <br />
            <input class="w3-input" name="d_name" placeholder="Enter Department Name" required />
            <br />
            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="w3-btn w3-btn-block w3-center w3-round w3-blue">Create</button>
            </div>
        </form>
    </div>
@endsection
