@extends('layout.layout')

@php
    $title = 'Contact Leads';
    $subTitle = 'Inquiries';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
        <h6 class="text-lg fw-semibold mb-0">Recent Inquiries</h6>
    </div>
    <div class="card-body p-24">
        <div class="table-responsive">
            <table class="table bordered-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Concern</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                    <tr>
                        <td>{{ $lead->created_at->format('d M, Y H:i') }}</td>
                        <td>{{ $lead->name }}</td>
                        <td>
                            <div>{{ $lead->email }}</div>
                            <div class="text-secondary-light">{{ $lead->phone }}</div>
                        </td>
                        <td>{{ $lead->subject }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#leadModal{{ $lead->id }}">
                                View Message
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="leadModal{{ $lead->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Message from {{ $lead->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Concern:</strong> {{ $lead->subject }}</p>
                                            <hr>
                                            <p>{{ $lead->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No leads found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-24">
            {{ $leads->links() }}
        </div>
    </div>
</div>
@endsection
