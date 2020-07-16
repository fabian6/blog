<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($post->photos as $photo)
            <li data-target="#carouselExampleCaptions" 
                data-slide-to="{{$loop->index}}" 
                class=" {{$loop->first ? 'active' : ''}}">
            </li>
        @endforeach
        
    </ol>
    <div class="carousel-inner">
        @foreach ($post->photos as $photo)
            <div class="item {{$loop->first ? 'active' : ''}}" >
                <img src="{{url($photo->url)}}" alt="">
            </div>
        @endforeach
        <div class="carousel-item active">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>