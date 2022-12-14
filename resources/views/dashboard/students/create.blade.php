@extends('layouts.dashboard.app')

@section('title', 'Create Student')

@push('css')
    {{-- Dropify CDN --}}
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
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <p class="m-0">Create</p>
            <a href="{{ route('admin.students.index') }}" class="btn btn-sm btn-info">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.students.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <p class="m-0">Create Student</p>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"><b>Name</b><span style="color: red">*</span></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="reg_no"><b>Registration Number</b> <span style="color: red">*</span></label>
                                     <input type="text" name="reg_no" id="reg_no" readonly
                                        class="form-control @error('reg_no') is-invalid @enderror"
                                        value="{{$latestReg}}" placeholder="Enter registration number">
                                    @error('reg_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="email"><b>Email Address</b> <span style="color: red">*</span></label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Enter email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 ">
                                    <label for="batch"><b>Batch</b> <span style="color: red">*</span></label>
                                    <select name="batch_id" id="batch"
                                        class="form-select @error('batch_id') is-invalid @enderror">
                                        <option value="">--Select batch--</option>
                                        @forelse ($batches as $batch)
                                            <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                        @empty
                                            <option>--No batch--</option>
                                        @endforelse
                                    </select>
                                    @error('batch_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 ">
                                    <label for="gender"><b>Gender</b> <span style="color: red">*</span></label>
                                    <select name="gender" id="gender"
                                        class="form-select @error('gender') is-invalid @enderror">
                                        <option value="">--Select gender--</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="contact_number"><b>Contact Number</b> <span style="color: red">*</span></label>
                                    <input type="text" name="contact_number" id="contact_number"
                                        class="form-control @error('contact_number') is-invalid @enderror"
                                        value="{{ old('contact_number') }}" placeholder="Enter contact number">
                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group mt-3">
                                    <label for="parent_contact"><b>Parent Contact Number</b> <span style="color: red">*</span></label>
                                    <input type="text" name="parent_contact" id="parent_contact"
                                        class="form-control @error('parent_contact') is-invalid @enderror"
                                        value="{{ old('parent_contact') }}" placeholder="Enter parent contact number">
                                    @error('parent_contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="current_address"><b>Current Address</b> <span style="color: red">*</span></label>
                                    <textarea name="current_address" id="current_address" rows="3"
                                        class="form-control @error('current_address') is-invalid @enderror" placeholder="Current Address...">{{ old('current_address') }}</textarea>
                                    @error('current_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="permanent_address"><b>Permanent address</b> <span style="color: red">*</span></label>
                                    <textarea name="permanent_address" id="permanent_address" rows="3"
                                        class="form-control @error('permanent_address') is-invalid @enderror" placeholder="Permanent address...">{{ old('permanent_address') }}</textarea>
                                    @error('permanent_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="monthly_fee"><b>Monthly Fee</b> <span style="color: red">*</span></label>
                                    <input type="text" name="monthly_fee" id="monthly_salary"
                                        class="form-control @error('monthly_fee') is-invalid @enderror" placeholder="Enter Monthly Fee">
                                    @error('monthly_fee')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="description"><b>Student Note</b></label>
                                    <textarea name="note" class="form-control" id="note" cols="40" rows="6"></textarea>
                                    @error('note')
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <b>Image upload</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group mt-3">
                                    <input type="file" id="profile"
                                        class="dropify form-control @error('profile') is-invalid @enderror"
                                        name="profile">
                                    @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 ">
                                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="mb-5"></div>
        </div>
    </div>
@endsection

@push('js')
    {{-- Dropify CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Ck Editor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
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
