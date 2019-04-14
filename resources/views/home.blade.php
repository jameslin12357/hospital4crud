@extends('layouts.app')

@section('content')

    @include('success')
    <div class="container pt-100">
    <div class="row">
        <div class="col-md-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="active-tab"><a href="/">Addresses</a></th>
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
                    <th scope="row"><a href="/patients">Patients</a></th>
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
                <th scope="col">Building Number</th>
                <th scope="col">Street</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Country</th>
                <th scope="col">Zip</th>
                <th scope="col">Date Created</th>
                <th scope="col">Date Edited</th>
                @if (Auth::user()->level === 1)
                    <th scope="col"><a href="/addresses/create" class="btn btn-outline-secondary">Create</a></th>
                @endif

            </tr>
            </thead>
            <tbody>
            @foreach ($addresses as $address)
                <tr>
                    <td>{{ $address->id }}</td>
                    <td>{{ $address->building_number }}</td>
                    <td>{{ $address->street }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->state }}</td>
                    <td>{{ $address->country }}</td>
                    <td>{{ $address->zip }}</td>
                    <td>{{ $address->date_created }}</td>
                    <td>{{ $address->date_edited }}</td>
                    @if (Auth::user()->level === 1)
                        <td>
                            <a href="/addresses/{{ $address->id }}/edit" class="btn btn-outline-secondary">Edit</a>
                        </td>
                        <td>
                            <form action="/addresses/{{ $address->id }}" method="post">
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
