   <!-- Services Start -->
   <div class="container-fluid service py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            @if (!empty($whatwedo))
                <h5 class="text-uppercase text-primary">{{ $whatwedo[0]->title }}</h5>
                <h1 class="mb-0">{{ $whatwedo[0]->subtitle }}</h1>
            @endif
        </div>
        <div class="row g-4">
    @foreach ($whatwedo as $row )
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="service-item">
            {{-- <img src="{{asset('protect-environment')}}/img/service-1.jpg" class="img-fluid w-100" alt="Image"> --}}
            <img src="{{ asset('storage/uploads/' . $row->image) }}" class="img-fluid" alt="Image">
            <div class="service-link">
                <a href="#" class="h4 mb-0">{{ $row->picturetitle }}</a>
            </div>
        </div>
        <p class="my-4">{{ $row->picturedescription }}</p>
    </div>

    @endforeach

            {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="service-item">
                    <img src="{{asset('protect-environment')}}/img/service-1.jpg" class="img-fluid w-100" alt="Image">
                    <div class="service-link">
                        <a href="#" class="h4 mb-0">Raising money to help</a>
                    </div>
                </div>
                <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </p>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="service-item">
                    <img src="{{asset('protect-environment')}}/img/service-2.jpg" class="img-fluid w-100" alt="Image">
                    <div class="service-link">
                        <a href="#" class="h4 mb-0"> close work with services</a>
                    </div>
                </div>
                <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </p>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="service-item">
                    <img src="{{asset('protect-environment')}}/img/service-3.jpg" class="img-fluid w-100" alt="Image">
                    <div class="service-link">
                        <a href="#" class="h4 mb-0">Pro Guided tours only</a>
                    </div>
                </div>
                <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </p>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="service-item">
                    <img src="{{asset('protect-environment')}}/img/service-4.jpg" class="img-fluid w-100" alt="Image">
                    <div class="service-link">
                        <a href="#" class="h4 mb-0">Protecting animal area</a>
                    </div>
                </div>
                <p class="my-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </p>
            </div> --}}
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center">
                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-4" href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->
