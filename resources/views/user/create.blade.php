@extends('layouts.app')
@section('content')
    <form action="{{ route('data.store') }}" method="POST" autocomplete="off" id="data_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="" id="data_method">

        <div class="row">
            <div class="col-xl-8 m-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="text-center font-weight-bold" id="data_heading"> Add User </h4>
                    </div>

                    <div class="card-body pl-4 pr-4">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="firstName"> Full Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="Name" class="form-control"
                                        placeholder="Full Name">
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="dateOfBirth"> Date of Birth <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" name="dob" id="dateOfBirth" class="form-control"
                                        placeholder="Date of Birth">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="email"> Email <span class="text-danger">*</span> </label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email">
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="phone"> Phone <span class="text-danger">*</span> </label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Phone">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-6">
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

                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" class="form-control-file" name="image" id="image">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-12">
                                <button class="btn btn-primary" id="user_btn" type="submit">Save</button>
                                <button class="btn btn-primary" type="reset">Clear</button>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $("#data_form").validate({
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
                    image: {
                        required: true,

                    }
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
                    image: {
                        required: "image is required",

                    },


                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
