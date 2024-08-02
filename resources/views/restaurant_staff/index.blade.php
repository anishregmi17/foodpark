@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Our Staffs</h1>
        <a href="{{ route('restaurant-staff.create') }}" class="btn btn-primary mb-3">Create Staff</a>
        <table class="table table-striped">
            <thead>
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
                        <td>
                            @if ($staffMember->profile_image)
                                <img src="{{ asset($staffMember->profile_image) }}" class="rounded-circle"
                                    alt="{{ $staffMember->name }}" style="width: 50px; height: 50px;">
                            @else
                                <img src="{{ asset('images/default-profile.png') }}" class="rounded-circle"
                                    alt="Default Profile Image" style="width: 50px; height: 50px;">
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
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
