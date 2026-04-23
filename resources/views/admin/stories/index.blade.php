@extends('layout.layout')

@php
    $title = 'Success Stories';
    $subTitle = 'Website Content';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
        <h6 class="text-lg fw-semibold mb-0">Stories List</h6>
        <a href="#" class="btn btn-primary btn-sm">Add New Story</a>
    </div>
    <div class="card-body p-24">
        <div class="table-responsive">
            <table class="table bordered-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Order</th>
                        <th scope="col">Patient/Title</th>
                        <th scope="col">Treatment</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stories as $story)
                    <tr>
                        <td>{{ $story->order }}</td>
                        <td>
                            <div class="fw-medium">{{ $story->patient_name ?? 'Anonymous' }}</div>
                            <div class="text-sm text-secondary-light">{{ $story->title }}</div>
                        </td>
                        <td>{{ $story->treatment_type }}</td>
                        <td>
                            @if($story->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <a href="#" class="btn btn-sm btn-outline-info">Edit</a>
                                <form action="#" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No stories found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
