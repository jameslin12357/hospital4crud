@extends('layouts.app')

@section('content')

    @include('success')
    <div class="container pt-100">
        <div class="row">
            <div class="col-md-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><a href="/">Addresses</a></th>
                        <!--<th scope="col">First</th>-->
                        <!--<th scope="col">Last</th>-->
                        <!--<th scope="col">Handle</th>-->
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <th scope="row"><a href="/doctors">Doctors</a></th>
                        <!--<td>Mark</td>-->
                        <!--<td>Otto</td>-->
                        <!--<td>@mdo</td>-->
                    </tr>
                    <tr>
                        <th scope="row"><a href="/genders">Genders</a></th>
                        <!--<td>Jacob</td>-->
                        <!--<td>Thornton</td>-->
                        <!--<td>@fat</td>-->
                    </tr>
                    <tr>
                        <th scope="row"><a href="/insurances">Insurances</a></th>
                        <!--<td>Larry</td>-->
                        <!--<td>the Bird</td>-->
                        <!--<td>@twitter</td>-->
                    </tr>
                    <tr>
                        <th scope="row"><a href="/medications">Medications</a></th>
                        <!--<td>Larry</td>-->
                        <!--<td>the Bird</td>-->
                        <!--<td>@twitter</td>-->
                    </tr>
                    <tr>
                        <th scope="row" class="active-tab"><a href="/patients">Patients</a></th>
                        <!--<td>Larry</td>-->
                        <!--<td>the Bird</td>-->
                        <!--<td>@twitter</td>-->
                    </tr>
                    <tr>
                        <th scope="row"><a href="/procedures">Procedures</a></th>
                        <!--<td>Larry</td>-->
                        <!--<td>the Bird</td>-->
                        <!--<td>@twitter</td>-->
                    </tr>
                    <tr>
                        <th scope="row"><a href="/visits">Visits</a></th>
                        <!--<td>Larry</td>-->
                        <!--<td>the Bird</td>-->
                        <!--<td>@twitter</td>-->
                    </tr>
                    <tr>
                        <th scope="row"><a href="/visitsmedications">Visitsmedications</a></th>
                        <!--<td>Larry</td>-->
                        <!--<td>the Bird</td>-->
                        <!--<td>@twitter</td>-->
                    </tr>
                    <tr>
                        <th scope="row"><a href="/visitsprocedures">Visitsprocedures</a></th>
                        <!--<td>Larry</td>-->
                        <!--<td>the Bird</td>-->
                        <!--<td>@twitter</td>-->
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9 ofx-s overflow-x">
                <h5>{{ $count }} Rows</h5>
                <table class="table">
                    <!--<thead>-->
                    <!--<tr>-->
                    <!--<th scope="col">#</th>-->
                    <!--<th scope="col">First</th>-->
                    <!--<th scope="col">Last</th>-->
                    <!--<th scope="col">Handle</th>-->
                    <!--</tr>-->
                    <!--</thead>-->
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Gender Id</th>
                        <th scope="col">Address Id</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Date Edited</th>
                        @if (Auth::user()->level === 1)
                            <th scope="col"><a href="/patients/create" class="btn btn-outline-secondary">Create</a></th>
                        @endif

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->first_name }}</td>
                            <td>{{ $patient->last_name }}</td>
                            <td>{{ $patient->age }}</td>
                            <td>{{ $patient->dob }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->phone_number }}</td>
                            <td>{{ $patient->gender_id }}</td>
                            <td>{{ $patient->address_id }}</td>
                            <td>{{ $patient->date_created }}</td>
                            <td>{{ $patient->date_edited }}</td>
                            @if (Auth::user()->level === 1)
                                <td>
                                    <a href="/patients/{{ $patient->id }}/edit" class="btn btn-outline-secondary">Edit</a>
                                </td>
                                <td>
                                    <form action="/patients/{{ $patient->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach



                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
