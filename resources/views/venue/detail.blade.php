@include('master.header-website')
<div id="main">
    <div class="venue_banner">
        <img src="{{ URL::asset("public/uploads/".$venue->banner_image) }}" style="width: 100%;" />
    </div>
    <div class="event_detail_main">
        <div class="clearfix"></div>
        <div class="marginboth">
            <div class="pull-left banner_image">
                <img src="{{ URL::asset("public/uploads/".$venue->logo_image) }}" height="140">
            </div>
            <div class="pull-left venue_description">
                <div class="venue_title">{{$venue->title}}</div>
                <div class="venue_etc">LOCATION: {{$venue->location}}</div>
                <div class="venue_etc">PHONE: {{$venue->phone_number}}</div>
                <div class="venue_etc">FAX: {{$venue->fax_number}}</div>
                <div class="venue_etc">HOURS OF OPERATION: 
                    <?php
                    echo date("h:i A", strtotime(date("Y-m-d ") . $venue->open_hours)) . " - "
                    . date("h:i A", strtotime(date("Y-m-d ") . $venue->close_hours))
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="map_w">
                <div id="map2" style="height: 200px"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div>
            <div class="title_style">About us</div>
            <div>
                {{$venue->about_us}}
            </div>
        </div>
        <div class="title_style">Our Events</div>
        <div class="venue_events">
            <div class="ownslider2 owl-carousel">
                <?php foreach ($events as $event): ?>  
                        <div class="item col portfolio <?php echo preg_replace('/[^a-z]/', '', strtolower($event->category_name)); ?>" data-cat="<?php echo preg_replace('/[^a-z]/', '', strtolower($event->category_name)); ?>">
                            <div class="white-box"> <a href="#" title=""><img src="{{ url('public/uploads/'.$event->image) }}" height="216" alt=""></a>
                                <div class="event-data">
                                    <div class="event-date">
                                        <h5>
                                            <span><?php echo date('F', $event->start_date) ?></span> <?php echo date('d', $event->start_date) ?><sup><?php echo date('S', $event->start_date) ?></sup>
                                            <br/>to<br/> 
                                            <span><?php echo date('F', $event->end_date) ?></span> <?php echo date('d', $event->end_date) ?><sup><?php echo date('S', $event->end_date) ?></sup>
                                        </h5>
                                    </div><!--/.event-date -->
                                    <div class="event-data-box">
                                        <h4>{{str_limit($event->title, $limit = 20, $end = '...')}}<span>{{ $event->category_name }}</span></h4>
                                        <h6>@ {{ $event->venue }}</h6>
                                    </div><!--/.event-data-box --> 
                                </div><!--/.event-data -->
                                <div class="action-box">
                                    <div class="event-date">
                                        <ul class="share-option-small">
                                            <li>
                                                <a href="javascript:void(0);" class="event_like" attr_id="{{ $event->id }}" attr_flag="{{ $event->flag }}" title="">
                                                    @if($event->flag == '2')
                                                    <img src="{{ URL::asset('public/website/images/fill-heart-icon.png') }}" alt="">
                                                    @else
                                                    <img src="{{ URL::asset('public/website/images/heart-icon.png') }}" alt="">
                                                    @endif
                                                </a>
                                            </li>
                                            <li>
                                                <div class="share_container">
                                                    <a href="javascript:void(0)">
                                                        <img class="share_btn" src="{{ URL::asset('public/website/images/share-icon.png') }}" alt="">
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
                                        </ul><!--/.share-option-small --> 
                                    </div><!--/.event-date -->
                                    <div class="event-data-box"> <a href="{{route("events.detail",$event->id)}}" class="button">What's On</a> </div><!--/.event-data-box --> 
                                </div><!--/.action-box --> 
                            </div><!--/.white-box --> 
                        </div><!--/.col -->
                    <?php endforeach; ?>
                <!--/.item --> 
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div><!--/#main -->

<style>
    .owl-item .white-box{
        height: 420px !important;
        margin: 0 20px;
    }
    .title_style{
        margin:50px 0 30px;
        text-transform: uppercase;
        font-size: 18px;
    }
    .marginboth{
        margin:20px 0;
    }
    .venue_title{
        font-weight: bold;
        margin:10px 0;
        font-size: 18px;
        color: #f75f29;
        text-transform: uppercase;
        margin-top: 10px;
    }
    .banner_image{
        width: 25%;
        float: left;
    }
    .venue_description{
        width: 40%;
        float: left;
    }
    .map_w{
        width:35%;
        height:35%;
        float: left;
    }
    .clearfix{
        clear: both;
    }
    .event_detail_main{
        margin: 0 40px 10px 40px;
    }
    @media(max-width:767px){
        .banner_image,.venue_description,.map_w{
            width: 100%;
        }
    }
</style>

<script>
// Initialize and add the map
    function initMap() {
// The location of Uluru
        var uluru = {lat: <?php echo $venue->latitude ?>, lng: <?php echo $venue->longitude ?>};
// The map, centered at Uluru
        var map = new google.maps.Map(
                document.getElementById('map2'), {zoom: 8, center: uluru});
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
@include('master.footer-website')