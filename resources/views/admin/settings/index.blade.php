@extends('layout.layout')

@php
    $title = 'Site Settings';
    $subTitle = 'Configuration';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24">
        <h6 class="text-lg fw-semibold mb-0">General Settings</h6>
    </div>
    <div class="card-body p-24">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="row gy-3">
                @foreach($settings as $setting)
                <div class="col-md-6">
                    <label class="form-label">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                    <input type="text" name="settings[{{ $setting->key }}]" class="form-control" value="{{ $setting->value }}">
                </div>
                @endforeach
            </div>
            <div class="mt-24">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
