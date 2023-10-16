@extends('layouts.app')
@section('content')
    <table class="table">
        <tr>
            <th> Name</th>
            <th>Date Of Birth</th>
            <th>Phone Number </th>
            <th>Email</th>
            <th>Gender</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
        @foreach ($user as $data)
            {{-- @dd($data) --}}
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->dob }}</td>
                <td>{{ $data->phone }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->gender }}</td>
                <td>
                    <div class="me-5 position-relative">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-45px symbol-circle">
                            <img alt="Pic" Width="200px" height="200px" src={{ asset('user_file/' . $data->image) }} />
                        </div>
                        <!--end::Avatar-->
                    </div>
                </td>
                <td>
                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#projectModal"
                        onclick="edit({{ $data->id }})">Edit</a>
                    <a class="btn btn-info" onclick="delete_user({{ $data->id }})">Delete</a>


                </td>
            </tr>
        @endforeach
    </table>
    <div class="modal fade" id="projectModal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form id="edit_form" method="post" class="form" action="" enctype="multipart/form-data">
                        <input id="edit_method" type="hidden" name="_method" value="">

                        <!--begin::Heading-->
                        @csrf
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3" id="edit_header"> Edit User</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            {{-- <div class="text-muted fw-bold fs-5">If you need more info, please check
                                <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.
                            </div> --}}
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        {{-- @dd($projects) --}}
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label for="firstName"> Full Name <span class="text-danger">*</span> </label>
                            <input type="text" name="name" id="editname" class="form-control" required
                                placeholder="Full Name">
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label for="dateOfBirth"> Date of Birth <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="dob" id="dateOfBirth" required class="form-control"
                                placeholder="Date of Birth">
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label for="email"> Email <span class="text-danger">*</span> </label>
                            <input type="email" required name="email" id="editemail" class="form-control"
                                placeholder="Email">
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label for="phone"> Phone <span class="text-danger">*</span> </label>
                                <input type="number" name="phone" id="editphone" class="form-control"
                                    placeholder="Phone">

                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label for="exampleFormControlFile1">Gender</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="male">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label for="exampleFormControlFile1">Image</label>
                                <input type="file" class="form-control-file" name="image" id="editimage">
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>


                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_target_cancel"
                                class="btn btn-light me-3">Cancel</button>
                            <button type="update" id="edit_form_button" class="btn btn-primary">
                                <span class="indicator-label">Update</span>

                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <script>
        $(document).ready(function() {
            $("#edit_form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 20,
                        // lettersonly: true,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50,
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true,
                    },
                    gender: {
                        required: true,
                    },
                    dob: {
                        required: true,
                        date: true
                    },

                },
                messages: {
                    name: {
                        required: "name is required",
                        maxlength: "First name cannot be more than 20 characters",
                        // lettersonly: "name contains alphabates only",
                    },
                    email: {
                        required: "Email is required",
                        email: "Email must be a valid email address",
                        maxlength: "Email cannot be more than 50 characters",
                    },
                    phone: {
                        required: "Phone number is required",
                        minlength: "Phone number must be of 10 digits"
                    },

                    gender: {
                        required: "Please select the gender",
                    },
                    dob: {
                        required: "Date of birth is required",
                        date: "Date of birth should be a valid date"
                    },



                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
