@extends('layouts.dashboard.app')

@section('title', 'Create Batche')


@push('css')
    {{-- Select2 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>
@endpush

@section('content')
    @include('layouts.dashboard.partials.alert')
    <form action="{{ route('admin.batches.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <p class="m-0">Create Batch</p>
                        <a href="{{ route('admin.batches.index') }}" class="btn btn-sm btn-dark">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <input type="hidden" name="batch_id" id="batchId">
                                <div class="form-group">
                                    <label for="batchname"><b>Batch Name</b>  <span style="color: red">*</span></label>
                                    <input type="text" value="{{ old('name') }}" class="form-control my-1" id="batchName" name="name" placeholder="Enter Batch Name" >
                                    <div id="validName" class="text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="subject_id"> <b>Select Subjects</b> <span style="color: red">*</span></label>
                                <select name="subject_id[]" class="multi-subject form-control @error('subject_id') is-invalid @enderror" multiple="multiple" id="mySelect2">
                                    <option value="0">
                                        All Subject
                                    </option>
                                    @forelse ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subject_id') === $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @empty
                                        <option>--No subject--</option>
                                    @endforelse
                                </select>
                                @error('subject_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="batch_fee"><b>Batch fee</b> <span style="color: red">*</span></label>
                                <input type="number" class="form-control my-1" id="batch_fee" value="{{ old('batch_fee') }}"  name="batch_fee" placeholder="Enter Batch Fee" >
                                @error('batch_fee')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="start_time"><b>Start Date</b> <span style="color: red">*</span></label>
                                <input type="date" name="start_date" class="form-control" placeholder="Start Time" value="{{ old('start_time') }}">
                                @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end_time"><b>End Date</b> <span style="color: red">*</span></label>
                                <input type="date" name="end_date" class="form-control" placeholder="End Time" value="{{ old('end_time') }}">
                                @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <label for="description"><b>Batch Note</b></label>
                            <textarea name="note" class="form-control" id="note" rows="10"></textarea>
                            @error('note')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="mb-5"></div>

    @push('js')
        {{-- Select2 CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.multi-subject').select2();
                $('#subject_id').on('change', function () {
                    let val = $('#subject_id').val();
                    console.log(val);
                    if (val == 0) {
                        $('#subject_id').attr('disabled', true);
                    } else {
                        $('#subject_id').attr('disabled', false);
                    }
                })
            ;})


        </script>


        {{-- Ckeditor5 --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#note'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],

                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@endsection
