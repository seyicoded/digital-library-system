@extends('admin.auth.Layout.app')
@section('content')
    <div>
        <h1 class="w3-center">View Department</h1>
        <br />

        <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable">
            <thead class="w3-lightblue">
                <tr class="w3-lightblue">
                    <th>s/n</th>
                    <th>faculty name</th>
                    <th>department name</th>
                    <th>date</th>
                </tr>
            </thead>

            <tbody>
                @if ( count($data['_data']) == 0 )
                    <tr>
                        <td colspan="3">no records yet</td>
                    </tr>
                @endif

                @foreach ( $data['_data'] as $dt)
                    <tr>
                        <td>{{$dt->d_id}}</td>
                        <td>{{$dt->f_name}}</td>
                        <td>{{$dt->d_name}}</td>
                        <td>{{date("d M Y", strtotime($dt->date_created))}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
