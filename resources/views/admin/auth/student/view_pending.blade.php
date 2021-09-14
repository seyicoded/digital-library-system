@extends('admin.auth.Layout.app')
@section('content')
    <div>
        <h1 class="w3-center">View Pending Students</h1>
        <br />

        <table class="w3-table w3-bordered w3-striped w3-border w3-hoverable">
            <thead class="w3-lightblue">
                <tr class="w3-lightblue">
                    <th>s/n</th>
                    <th>matric</th>
                    <th>date</th>
                    <th>action</th>
                    <th>action</th>
                </tr>
            </thead>

            <tbody>
                @if ( count($data['_data']) == 0 )
                    <tr>
                        <td colspan="4">no records yet</td>
                    </tr>
                @endif

                @foreach ( $data['_data'] as $dt)
                    <tr>
                        <td>{{$dt->u_id}}</td>
                        <td>{{$dt->matric_numb}}</td>
                        <td>{{date("d M Y", strtotime($dt->date_created))}}</td>
                        <td><button class="w3-btn w3-blue w3-round" onclick="window.location.href = '{{url('/admin/approve-student').'?u_id='.$dt->u_id}}'">approve</button></td>
                        <td><button class="w3-btn w3-red w3-round" onclick="window.location.href = '{{url('/admin/decline-student').'?u_id='.$dt->u_id}}'">decline</button></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
