@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Staff List</h1>
        <a href="{{ route('restaurant-staff.create') }}" class="btn btn-primary mb-3">Create New Staff</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Profile</th>
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
                                        alt="{{ $staffMember->name }}" style="width: 80px; height: 80px;">
                                @else
                                    <img src="{{ asset('images/default-profile.png') }}" class="rounded-circle"
                                        alt="Default Profile Image" style="width: 80px; height: 80px;">
                                @endif
                            </td>
                            <td><strong>{{ $staffMember->name }}</strong></td>
                            <td>
                                <span class="badge badge-info">{{ $staffMember->role }}</span>
                            </td>
                            <td>{{ $staffMember->contact }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('restaurant-staff.edit', $staffMember->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('restaurant-staff.destroy', $staffMember->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
