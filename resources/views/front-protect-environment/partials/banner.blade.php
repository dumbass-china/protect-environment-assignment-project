 <!-- Carousel Start -->
 <div class="container-fluid carousel-header vh-100 px-0">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($banners as $row)
            <div class="carousel-item active">
        <img src="{{ asset('storage/uploads/' . $row->image) }}" class="img-fluid" alt="Image">

                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">{{ $row->title }}</h4>
                        <h1 class="display-1 text-capitalize text-white mb-4">{{ $row->subtitle }}</h1>
                        <p class="mb-5 fs-5">{{$row->description}}</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">{{ $row->button }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="carousel-item">
                <img src="{{asset('protect-environment')}}/img/carousel-2.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">WE'll Save Our Planet</h4>
                        <h1 class="display-1 text-capitalize text-white mb-4">Protect Environment</h1>
                        <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Join With Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('protect-environment')}}/img/carousel-3.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">WE'll Save Our Planet</h4>
                        <h1 class="display-1 text-capitalize text-white mb-4">Protect Environment</h1>
                        <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Join With Us</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
