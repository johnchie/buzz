@include('master.header-website')
<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
    }
</style>
<div id="main">
    <div class="same-padd main-events" id="topevents">
        <div class="event-main-title">
            <h2>{{ $event->title }} <span>{{ $event->category_name }}</span> </h2>
        </div><!--/.event-main-title -->
        <section class="swiper-container loading">
            <div class="swiper-wrapper">
                <div class="swiper-slide"> <img src="{{ URL::asset('public/website/images/slider-pic01.png') }}" class="entity-img" /> </div>
                <div class="swiper-slide"> <img src="{{ URL::asset('public/website/images/slider-pic01.png') }}" class="entity-img" /> </div>
                <div class="swiper-slide"> <img src="{{ URL::asset('public/website/images/slider-pic01.png') }}" class="entity-img" /> </div>
            </div><!--/.swiper-wrapper -->
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </section><!--/.swiper-container loading -->
        <div class="swiper-option">
            <div class="content">
                <ul class="slider-data">
                    <li>
                        <h4>START Date :  <span><?php echo date('F', $event->start_date) ?></span> <?php echo date('d', $event->start_date) ?><sup><?php echo date('S', $event->start_date) ?></sup> </h4>
                    </li>
                    <li>
                        <h4>End Date :  <span><?php echo date('F', $event->end_date) ?></span> <?php echo date('d', $event->end_date) ?><sup><?php echo date('S', $event->end_date) ?></sup> </h4>
                    </li>
                    <li>
                        <h4>START TIME:  <span><?php echo date('h:i A', $event->start_date) ?></span></h4>
                    </li>
                    <li>
                        <h4>END TIME :  <span><?php echo date('h:i A', $event->end_date) ?></span> </h4>
                    </li>
                </ul>
                <div class="share-option">
                    <ul>
                        <li><a href="#" title=""><img src="{{ URL::asset('public/website/images/heart.png') }}" alt=""></a></li>
                        <!--<li><a href="#" title=""><img src="{{ URL::asset('public/website/images/share.png') }}" alt=""></a></li>-->
                        <li>
                            <div class="share_container">
                                <a href="javascript:void(0)">
                                    <img class="share_btn" src="{{ URL::asset('public/website/images/share.png') }}" alt="">
                                </a>
                                <div class="small_popup">
                                    <a class="close_share" href="javascript:void(0)" style="float: right;">X</a>
                                    <a 
                                        href="javasciprt:void(0)" 
                                        onclick="postToFeed(jQuery(this))" 
                                        data-link="{{route("events.detail",$event->id)}}" 
                                        data-name="{{$event->title}}"
                                        data-location="{{ $event->venue }}"
                                        data-image="{{ url('public/uploads/'.$event->image) }}">
                                        <img src="{{ URL::asset('public/website/images/fb.png') }}" alt="">
                                    </a>
                                    <a href="http://twitter.com/intent/tweet?text={{$event->title}}&url={{route('events.detail',$event->id)}}"+ onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank">
                                        <img src="{{ URL::asset('public/website/images/tw.png') }}" alt="">
                                    </a>
                                    <a href="https://plus.google.com/share?url={{route("events.detail",$event->id)}}"+ onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        <img src="{{ URL::asset('public/website/images/google.png') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!--/.share-option --> 
            </div><!--/.content -->
        </div><!--/.swiper-option -->
    </div><!--/.same-padd --> 
    <div class="event-details same-padd">
        <div class="wrap">
            <div class="cols cols2 default-grid">
                <div class="col">
                    <div class="map-box">
                        <div id="map"></div>
                    </div>
                </div><!--/.col -->
                <div class="col">
                    <div class="detail-data">
                        <ul>
                            <li>
                                <h3>Event Organized by <span>{{ $event->organized_name }}</span></h3>
                            </li>
                            <li>
                                <p>Address : {{ $event->address }}</p>
                            </li>
                            <li>
                                <p>City : {{ $event->city }}</p>
                                <p>State : {{ $event->state }}</p>
                            </li>
                            <li>
                                <p>Contact:<a href="tal:{{ $event->contact_number }}" title="">{{ $event->contact_number }} </a></p>
                                <p>Email:<a href="mailto:{{ $event->email }}" title="">{{ $event->email }}</a></p>
                                <p>Website:<a href="#" title="">{{ $event->website_url }}</a></p>
                            </li>
                        </ul>
                    </div>
                </div><!--/.col -->
            </div><!--/.cols cols2 -->
            <div class="description">
                <h5>Description</h5>
                <p>{{ $event->description }}</p>
            </div><!--/.description -->
        </div><!--/.wrap -->
    </div><!--/.event-details -->
    <div class="similar-events">
        <div class="wrap">
            <h3>similar events</h3>
            <div class="similar-events-slider">
                <div class="similar-banner owl-carousel">
                    <div class="item">
                        <div class="white-box"> <a href="#" title=""><img src="{{ URL::asset('public/website/images/events-pic01.png') }}" alt=""></a>
                            <div class="event-data">
                                <div class="event-date">
                                    <h5><span>April</span> 25<sup>th</sup> to 27<sup>th</sup></h5>
                                </div><!--/.event-date -->
                                <div class="event-data-box">
                                    <h4>FIESTA MUSIC<span>Fusion Rock</span></h4>
                                    <h6>@Goroka</h6>
                                </div><!--/.event-data-box --> 
                            </div><!--/.event-data -->
                            <div class="action-box">
                                <div class="event-date">
                                    <ul class="share-option-small">
                                        <li><a href="#" title=""><img src="images/heart-icon.png" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/share-icon.png" alt=""></a></li>
                                    </ul><!--/.share-option-small --> 
                                </div><!--/.event-date -->
                                <div class="event-data-box"> <a href="#" class="button">What's On</a> </div><!--/.event-data-box --> 
                            </div><!--/.action-box --> 
                        </div><!--/.white-box --> 
                    </div><!--/.item -->
                    <div class="item">
                        <div class="white-box"> <a href="#" title=""><img src="{{ URL::asset('public/website/images/events-pic01.png') }}" alt=""></a>
                            <div class="event-data">
                                <div class="event-date">
                                    <h5><span>April</span> 25<sup>th</sup> to 27<sup>th</sup></h5>
                                </div><!--/.event-date -->
                                <div class="event-data-box">
                                    <h4>FIESTA MUSIC<span>Fusion Rock</span></h4>
                                    <h6>@Goroka</h6>
                                </div><!--/.event-data-box --> 
                            </div><!--/.event-data -->
                            <div class="action-box">
                                <div class="event-date">
                                    <ul class="share-option-small">
                                        <li><a href="#" title=""><img src="images/heart-icon.png" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/share-icon.png" alt=""></a></li>
                                    </ul><!--/.share-option-small --> 
                                </div><!--/.event-date -->
                                <div class="event-data-box"> <a href="#" class="button">What's On</a> </div><!--/.event-data-box --> 
                            </div><!--/.action-box --> 
                        </div><!--/.white-box --> 
                    </div><!--/.item -->
                    <div class="item">
                        <div class="white-box"> <a href="#" title=""><img src="{{ URL::asset('public/website/images/events-pic01.png') }}" alt=""></a>
                            <div class="event-data">
                                <div class="event-date">
                                    <h5><span>April</span> 25<sup>th</sup> to 27<sup>th</sup></h5>
                                </div><!--/.event-date -->
                                <div class="event-data-box">
                                    <h4>FIESTA MUSIC<span>Fusion Rock</span></h4>
                                    <h6>@Goroka</h6>
                                </div><!--/.event-data-box --> 
                            </div><!--/.event-data -->
                            <div class="action-box">
                                <div class="event-date">
                                    <ul class="share-option-small">
                                        <li><a href="#" title=""><img src="images/heart-icon.png" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/share-icon.png" alt=""></a></li>
                                    </ul><!--/.share-option-small --> 
                                </div><!--/.event-date -->
                                <div class="event-data-box"> <a href="#" class="button">What's On</a> </div><!--/.event-data-box --> 
                            </div><!--/.action-box --> 
                        </div><!--/.white-box --> 
                    </div><!--/.item -->
                    <div class="item">
                        <div class="white-box"> <a href="#" title=""><img src="{{ URL::asset('public/website/images/events-pic01.png') }}" alt=""></a>
                            <div class="event-data">
                                <div class="event-date">
                                    <h5><span>April</span> 25<sup>th</sup> to 27<sup>th</sup></h5>
                                </div><!--/.event-date -->
                                <div class="event-data-box">
                                    <h4>FIESTA MUSIC<span>Fusion Rock</span></h4>
                                    <h6>@Goroka</h6>
                                </div><!--/.event-data-box --> 
                            </div><!--/.event-data -->
                            <div class="action-box">
                                <div class="event-date">
                                    <ul class="share-option-small">
                                        <li><a href="#" title=""><img src="images/heart-icon.png" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/share-icon.png" alt=""></a></li>
                                    </ul><!--/.share-option-small --> 
                                </div><!--/.event-date -->
                                <div class="event-data-box"> <a href="#" class="button">What's On</a> </div><!--/.event-data-box --> 
                            </div><!--/.action-box --> 
                        </div><!--/.white-box --> 
                    </div><!--/.item -->
                    <div class="item">
                        <div class="white-box"> <a href="#" title=""><img src="{{ URL::asset('public/website/images/events-pic01.png') }}" alt=""></a>
                            <div class="event-data">
                                <div class="event-date">
                                    <h5><span>April</span> 25<sup>th</sup> to 27<sup>th</sup></h5>
                                </div><!--/.event-date -->
                                <div class="event-data-box">
                                    <h4>FIESTA MUSIC<span>Fusion Rock</span></h4>
                                    <h6>@Goroka</h6>
                                </div><!--/.event-data-box --> 
                            </div><!--/.event-data -->
                            <div class="action-box">
                                <div class="event-date">
                                    <ul class="share-option-small">
                                        <li><a href="#" title=""><img src="images/heart-icon.png" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/share-icon.png" alt=""></a></li>
                                    </ul><!--/.share-option-small --> 
                                </div><!--/.event-date -->
                                <div class="event-data-box"> <a href="#" class="button">What's On</a> </div><!--/.event-data-box --> 
                            </div><!--/.action-box --> 
                        </div><!--/.white-box --> 
                    </div><!--/.item -->
                    <div class="item">
                        <div class="white-box"> <a href="#" title=""><img src="{{ URL::asset('public/website/images/events-pic01.png') }}" alt=""></a>
                            <div class="event-data">
                                <div class="event-date">
                                    <h5><span>April</span> 25<sup>th</sup> to 27<sup>th</sup></h5>
                                </div><!--/.event-date -->
                                <div class="event-data-box">
                                    <h4>FIESTA MUSIC<span>Fusion Rock</span></h4>
                                    <h6>@Goroka</h6>
                                </div><!--/.event-data-box --> 
                            </div><!--/.event-data -->
                            <div class="action-box">
                                <div class="event-date">
                                    <ul class="share-option-small">
                                        <li><a href="#" title=""><img src="images/heart-icon.png" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/share-icon.png" alt=""></a></li>
                                    </ul><!--/.share-option-small --> 
                                </div><!--/.event-date -->
                                <div class="event-data-box"> <a href="#" class="button">What's On</a> </div><!--/.event-data-box --> 
                            </div><!--/.action-box --> 
                        </div><!--/.white-box --> 
                    </div><!--/.item --><div class="item">
                        <div class="white-box"> <a href="#" title=""><img src="{{ URL::asset('public/website/images/events-pic01.png') }}" alt=""></a>
                            <div class="event-data">
                                <div class="event-date">
                                    <h5><span>April</span> 25<sup>th</sup> to 27<sup>th</sup></h5>
                                </div><!--/.event-date -->
                                <div class="event-data-box">
                                    <h4>FIESTA MUSIC<span>Fusion Rock</span></h4>
                                    <h6>@Goroka</h6>
                                </div><!--/.event-data-box --> 
                            </div><!--/.event-data -->
                            <div class="action-box">
                                <div class="event-date">
                                    <ul class="share-option-small">
                                        <li><a href="#" title=""><img src="images/heart-icon.png" alt=""></a></li>
                                        <li><a href="#" title=""><img src="images/share-icon.png" alt=""></a></li>
                                    </ul><!--/.share-option-small --> 
                                </div><!--/.event-date -->
                                <div class="event-data-box"> <a href="#" class="button">What's On</a> </div><!--/.event-data-box --> 
                            </div><!--/.action-box --> 
                        </div><!--/.white-box --> 
                    </div><!--/.item -->
                </div><!--/.similar-banner owl-carousel -->
            </div><!--/.similar-events-slider -->
        </div><!--/.wrap -->
    </div><!--/.similar-events -->
</div><!--/#main -->
@include('master.footer-website')
<script>
// Initialize and add the map
    function initMap() {
// The location of Uluru
        var uluru = {lat: <?php echo $event->latitude ?>, lng: <?php echo $event->longtitude ?>};
// The map, centered at Uluru
        var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 8, center: uluru});
// The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5TKneM6O59qvZq9IqRShqssdF_8miOkU&callback=initMap">
</script>
