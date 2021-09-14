@extends('admin.auth.Layout.app')
@section('content')
    <div>
        <h1 class="w3-center">Add Publication</h1>
        {{-- <marquee>A notification, like </marquee> --}}
        <br />
        <form class="w3-padding-4" method="POST" style="width: 94%">
            @csrf
            <input class="w3-input" name="p_name" placeholder="Enter Title" required />
            <label class="w3-label">Title</label>
            <br>
            <textarea name="p_content" placeholder="Enter Content" class="w3-input form-control w3-round" required></textarea>
            <label class="w3-label">Content</label>
            <br />
            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="w3-btn w3-btn-block w3-center w3-round w3-blue">Add</button>
            </div>
        </form>
    </div>
@endsection
