@extends('admin.auth.Layout.app')
@section('content')
    <div>
        <h1 class="w3-center">Add Books</h1>
        <br />
        <form class="w3-padding-4" method="POST" style="width: 94%" enctype="multipart/form-data">
            @csrf
            <div>
                <select name="f_name" class="w3-select w3-round custom-select" onchange="load_department(this)">
                    <option>select faculty</option>
                    @foreach ($data['_data'] as $dt)
                        <option value="{{$dt->f_name}}">{{$dt->f_name}}</option>
                    @endforeach
                </select>
                <label class="w3-label">Select Faculty</label>
            </div>
            <br />

            <div>
                <select name="d_name" class="w3-select w3-round custom-select">

                </select>
                <label class="w3-label">Select Department</label>
            </div>
            <br />

            <input class="w3-input" name="b_name" placeholder="Enter Book Name" required />
            <br />
            <input class="w3-input" name="b_author" placeholder="Enter Book Author" required />
            <br />
            <input class="w3-input" type="file" name="file" required />
            <div class="w3-alert">only images and pdfs are supported....</div>
            <br />
            <div style="display: flex; justify-content: flex-end;">
                <button type="submit" class="w3-btn w3-btn-block w3-center w3-round w3-blue">Create</button>
            </div>

            <br>
            <br>
            <br>
        </form>
    </div>

    <script>
        function load_department(select){
            var box = $("select[name='d_name']");

            box.html('<option>loading</option>');

            $.get('{{url('/admin/get_department')}}?f_name='+select.value,  // url
            function (data, textStatus, jqXHR) {  // success callback
                box.html(data)
            });
        }
    </script>
@endsection
