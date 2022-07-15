@extends('template.web')

@section('title', 'Users Account')


@section('main-content')

    <div class="table-section">
        <h1 class="title-section">Users Account Table</h1>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">

                {{-- head --}}
                <thead>
                    <tr class="text-center">
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                    </tr>
                </thead>

                {{-- tbody --}}
                <tbody>
                    @foreach ($dataUsers as $datas)
                        <tr class="text-center">
                            <td>{{ $datas->fullName }}</td>
                            <td>{{ $datas->email }}</td>
                            <td>{{ $datas->roles }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

@endsection
