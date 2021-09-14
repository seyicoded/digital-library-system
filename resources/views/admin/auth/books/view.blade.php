@extends('admin.auth.Layout.app')
@section('content')
    <div>
        <h1 class="w3-center">View Books</h1>
        <br />

        <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable">
            <thead class="w3-lightblue">
                <tr class="w3-lightblue">
                    <th>s/n</th>
                    <th>faculty</th>
                    <th>department</th>
                    <th>name</th>
                    <th>author</th>
                    <th>open book</th>
                    <th>date</th>
                </tr>
            </thead>

            <tbody>
                @if ( count($data['_data']) == 0 )
                    <tr>
                        <td colspan="7">no records yet</td>
                    </tr>
                @endif

                @foreach ( $data['_data'] as $dt)
                    <tr>
                        <td>{{$dt->b_id}}</td>
                        <td>{{$dt->f_name}}</td>
                        <td>{{$dt->d_name}}</td>
                        <td>{{$dt->b_name}}</td>
                        <td>{{$dt->b_author}}</td>
                        <td><a href="{{$dt->b_path}}" target="_blank">view book</a></td>
                        <td>{{date("d M Y", strtotime($dt->date_created))}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
