@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3">Our Staffs</h1>
        <a href="{{ route('restaurant-staff.create') }}" class="btn btn-primary mb-3">Create Staff</a>
        <div class="row">
            @foreach ($staff as $staffMember)
                <div class="col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card">
                        @if ($staffMember->profile_image)
                            <img src="{{ asset($staffMember->profile_image) }}"
                                class="card-img-top rounded-circle mx-auto d-block" alt="{{ $staffMember->name }}">
                        @else
                            <img src="{{ asset('images/default-profile.png') }}"
                                class="card-img-top rounded-circle mx-auto d-block" alt="Default Profile Image">
                        @endif
                        <div class="card-body text-center">
                            <h6 class="card-title">{{ $staffMember->name }}</h6>
                            <p class="card-text">{{ $staffMember->role }}-{{ $staffMember->contact }}</p>
                            <div class="btn-group mt-auto">
                                <a href="{{ route('restaurant-staff.edit', $staffMember->id) }}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('restaurant-staff.destroy', $staffMember->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
