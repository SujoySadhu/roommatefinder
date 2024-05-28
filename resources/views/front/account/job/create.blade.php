@extends('front.layouts.app')
@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                <form action="" method="post" id="createJobForm" name="createJobForm" enctype="multipart/form-data">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Post Details</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="title" class="mb-2">Title<span class="req">*</span></label>
                                    <input type="text" placeholder="Post Title" id="title" name="title" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="category" class="mb-2">Category<span class="req">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" disabled selected>Select a Category</option>
                                        @if($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="jobType" class="mb-2">Gender<span class="req">*</span></label>
                                    <select name="jobType" id="jobType" class="form-select">
                                        <option value="" disabled selected></option>
                                        @if($jobTypes->isNotEmpty())
                                            @foreach ($jobTypes as $jobType)
                                                <option value="{{$jobType->id}}">{{$jobType->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p></p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="vacancy" class="mb-2">Seat Available<span class="req">*</span></label>
                                    <input type="number" min="1" placeholder="Seat Available" id="vacancy" name="vacancy" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="salary" class="mb-2">Monthly Rent</label>
                                    <input type="text" placeholder="Monthly Rent" id="salary" name="salary" class="form-control">
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label for="location" class="mb-2">Location<span class="req">*</span></label>
                                    <input type="text" placeholder="Location" id="location" name="location" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Room Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <p class="text-danger" id="image-error"></p>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="benefits" class="mb-2">Special facilities </label>
                                <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="responsibility" class="mb-2">Responsibility</label>
                                <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="qualifications" class="mb-2">Qualifications</label>
                                <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="Preferred Age" class="mb-2">PreferredAGE<span class="req">*</span></label>
                                <select name="experience" id="experience" class="form-select">
                                    <option value="15">15</option>
                                    <option value="16">16 </option>
                                    <option value="17">17 </option>
                                    <option value="18">18</option>
                                    <option value="19">19 </option>
                                    <option value="20">20 </option>
                                    <option value="21">21</option>
                                    <option value="22">22 </option>
                                    <option value="23">23 </option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26 </option>
                                    <option value="27">27 </option>
                                    <option value="28">28</option>
                                    <option value="29">29 </option>
                                    <option value="30">30 </option>
                               
                                    <option value="30_plus">30+</option>
                                </select>
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="keywords" class="mb-2">Keywords</label>
                                <input type="text" placeholder="Keywords" id="keywords" name="keywords" class="form-control">
                            </div>
                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Roommate Seeker Details</h3>
                            <div class="row">
                                <div class="mb-4">
                                    <label for="seekername" class="mb-2"> Name<span class="req">*</span></label>
                                    <input type="text" placeholder=" Name" id="seekername" name="seekername" class="form-control">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="Phonenumber" class="mb-2">Phone Number<span class="req">*</span></label>
                                    <input type="text" placeholder="Provide your Phone number" id="seekerphonenumber" name="seekerphonenumber" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="SeekerEmail" class="mb-2">Email<span class="req">*</span></label>
                                    <input type="text" placeholder="Provide your email" id="seekeremail" name="seekeremail" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-4">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
<script type="text/javascript">
$("#createJobForm").submit(function(e){
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '{{ route("account.saveJob") }}',
        type: 'post',
        datatype: 'json',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
            if(response.status == true){
                $(".is-invalid").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                window.location.href = "{{route('account.myJobs')}}";
            } else {
                var errors = response.errors;
                for (const [key, value] of Object.entries(errors)) {
                    $("#" + key).addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(value);
                }
            }
        }
    });
});
</script>
@endsection
