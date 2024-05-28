@extends('front.layouts.app')
@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center" data-bg="{{ asset('assets/images/banner5.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Need a Roommate?</h1>
                <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a></div>
            </div>
        </div>
    </div>
</section>

<section class="section-1 py-5 bg-light"> 
    <div class="container">
        <div class="card border-0 shadow p-5 rounded-3">
            <h2 class="text-center mb-4">Find Your Ideal Roommate</h2>
            <form action="{{route('jobs')}}" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control form-control-lg" name="keyword" id="keyword" placeholder="Keywords" aria-label="Keywords">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control form-control-lg" name="location" id="location" placeholder="Location" aria-label="Location">
                    </div>
                    <div class="col-md-3">
                        <select name="category" id="category" class="form-select form-select-lg" aria-label="Select Category">
                            <option value="">Select Category</option>
                            @if($newCategories->isNotEmpty())
                            @foreach ($newCategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3 d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Search</button>
                    </div>
                </div> 
            </form>           
        </div>
    </div>
</section>

<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2 class="text-center mb-5">Popular Categories</h2>
        <div class="row g-4">
            @if($categories->isNotEmpty())
                @foreach ($categories as $category)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="card category-card border-0 shadow h-100 text-center">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="category-icon mb-3">
                                <i class="fa fa-home fa-2x"></i> <!-- Replace with relevant icons for each category -->
                            </div>
                            <h4 class="pb-2">{{$category->name}}</h4>
                            <a href="{{route('jobs').'?category='.$category->id}}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<section class="section-3 py-5">
    <div class="container">
        <h2>Featured posts</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row gy-4">
                        @if ($featuredJobs->isNotEmpty())
                        @foreach ($featuredJobs as $featuredJob)
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4 h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="job-image mb-3" style="flex: 1;">
                                        <img src="{{ asset('job_images/thumb/'. $featuredJob->image) }}" alt="{{ $featuredJob->title }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                                    </div>
                                    <h3 class="border-0 fs-5 pb-2 mb-3">{{$featuredJob->title}}</h3>
                                    <div class="mb-3">
                                        <p class="mb-1">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1">{{$featuredJob->location}}</span>
                                        </p>
                                        <p class="mb-1">
                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                            <span class="ps-1">{{$featuredJob->jobType->name}}</span>
                                        </p>
                                        @if (!is_null($featuredJob->salary))
                                        <p class="mb-1">
                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                            <span class="ps-1">{{$featuredJob->salary}}</span>
                                        </p>
                                        @endif
                                    </div>
                                    <div class="d-grid mt-auto">
                                        <a href="{{ route('jobDetail', $featuredJob->id) }}" class="btn btn-custom btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 py-5">
    <div class="container">
        <h2>Latest posts</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($latestJobs->isNotEmpty())
                        @foreach ($latestJobs as $latestJob)
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 p-3 shadow h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="job-image mb-3" style="flex: 1;">
                                        <img src="{{ asset('job_images/thumb/'.$latestJob->image) }}" alt="{{ $latestJob->title }}" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                                    </div>
                                    <h3 class="border-0 fs-5 pb-2 mb-3">{{ $latestJob->title }}</h3>
                                    <div class="mb-3">
                                        <p class="mb-1">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1">{{ $latestJob->location }}</span>
                                        </p>
                                        <p class="mb-1">
                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                            <span class="ps-1">{{ $latestJob->jobType->name }}</span>
                                        </p>
                                        @if (!is_null($latestJob->salary))
                                        <p class="mb-1">
                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                            <span class="ps-1">{{ $latestJob->salary }}</span>
                                        </p>
                                        @endif
                                    </div>
                                    <div class="d-grid mt-auto">
                                        <a href="{{ route('jobDetail', $latestJob->id) }}" class="btn btn-custom btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Add this CSS in your style block or file -->
<style>
.section-1 .card {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.section-1 h2 {
    font-weight: bold;
    color: #333333;
    margin-bottom: 20px;
}

.section-1 .form-control,
.section-1 .form-select {
    height: 50px;
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 10px 15px;
}

.section-1 .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    font-size: 18px;
    padding: 10px;
    transition: background-color 0.3s, transform 0.3s;
}

.section-1 .btn-primary:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

.category-card {
    transition: transform 0.3s, box-shadow 0.3s;
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.category-icon {
    color: #FFD700;
    font-size: 3rem;
}

.btn-custom {
    background-color: #007bff;
    color: #ffffff;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-custom:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}
</style>
