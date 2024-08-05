@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Our Staff</h1>
        <a href="{{ route('restaurant-staff.create') }}" class="btn btn-primary mb-3">Create Staff</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $staffMember)
                        <tr>
                            <td class="text-center">
                                @if ($staffMember->profile_image)
                                    <img src="{{ asset($staffMember->profile_image) }}" class="rounded-circle"
                                        alt="{{ $staffMember->name }}" style="width: 100px; height: 100px;">
                                @else
                                    <img src="{{ asset('images/default-profile.png') }}" class="rounded-circle"
                                        alt="Default Profile Image" style="width: 120px; height: 120px;">
                                @endif
                            </td>
                            <td>{{ $staffMember->name }}</td>
                            <td>{{ $staffMember->role }}</td>
                            <td>{{ $staffMember->contact }}</td>
                            <td>
                                <a href="{{ route('restaurant-staff.edit', $staffMember->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('restaurant-staff.destroy', $staffMember->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
