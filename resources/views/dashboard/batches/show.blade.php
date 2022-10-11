@extends('layouts.dashboard.app')

@section('title', 'Batch Details')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="d-flex align-items-center justify-content-between" style="width: 100%">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.batches.index') }}">Batch List</a>
            </li>
        </ol>
        <a href="{{ route('admin.batches.index') }}" class="btn btn-sm btn-dark">Back to list</a>
    </nav>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <p class="m-0">Bath Information</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="table" class="table table-bordered data-table" style="width: 100%">
                        <tbody>
                            <tr>
                                <td>Batch Name</td>
                                <td>{{ $batch->name }}</td>
                            </tr>
                            <tr>
                                <td>Subject List</td>
                                <td>{{ $batchSubs }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $batch->status ? 'Active' : 'Dead' }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{!! $batch->note !!}</td>
                            </tr>
                            <tr>
                                <td>Start Time</td>
                                <td>{{ $batch->start_time }}</td>
                            </tr>
                            <tr>
                                <td>End Time</td>
                                <td>{{ $batch->end_time }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    @can('batch_edit')
                        <div class="form-group mt-3">
                            <a href="{{ route('admin.batches.edit', $batch->id) }}" class="btn btn-sm btn-primary" onclick="">Edit</a>
                        </div>
                    @endcan
                </div>

            </div>
        </div>
    </div>
@endsection