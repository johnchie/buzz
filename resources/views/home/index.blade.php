@include('master.header-website')

<div class="mainslider" id="home">
    <div class="homeslider owl-carousel">
        <div class="item">
            <div class="slider-pic">
                <figure><img src="{{ URL::asset('public/website/images/slider-pic.jpg') }}" alt=""></figure>
            </div>
            <!--/.slider-pic --> 
        </div>
        <!--/.item -->
        <div class="item">
            <div class="slider-pic">
                <figure><img src="{{ URL::asset('public/website/images/slider-pic.jpg') }}" alt=""></figure>
            </div>
            <!--/.slider-pic --> 
        </div>
        <!--/.item -->
        <div class="item">
            <div class="slider-pic">
                <figure><img src="{{ URL::asset('public/website/images/slider-pic.jpg') }}" alt=""></figure>
            </div>
            <!--/.slider-pic --> 
        </div>
        <!--/.item --> 
    </div>
    <!--/.homeslider --> 
</div> <!--/.mainslider -->
<div id="main">
    <div class="same-padd" id="topevents">
        <div class="event-title">
            <h1>TOP EVENTS</h1>
        </div><!--/.event-title -->

        <section class="swiper-container loading">
            <div class="swiper-wrapper">
                <?php foreach ($events as $event): ?>
                    <?php if ($event->top_events == 1): ?>
                        <div class="swiper-slide"> 
                            <img src="{{ url('public/uploads/'.$event->image) }}" height="331" class="entity-img" /> 
                            <div class="swiper-option">
                                <div class="content">
                                    <ul class="slider-data">
                                        <li>
                                            <div class="date">
                                                <span><?php echo date('F', $event->start_date) ?></span> <?php echo date('d', $event->start_date) ?><sup><?php echo date('S', $event->start_date) ?></sup> to 
                                                <span><?php echo date('F', $event->end_date) ?></span> <?php echo date('d', $event->end_date) ?><sup><?php echo date('S', $event->end_date) ?></sup>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="fusion-rock">{{ $event->title }}<span>{{ $event->category_name }}</span></div>
                                        </li>
                                        <li>
                                            <div class="user">@ {{ $event->venue }}</div>
                                        </li>
                                    </ul>
                                    <div class="share-option">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);" class="event_like" attr_id="{{ $event->id }}" attr_large_icon='1' attr_flag="{{ $event->flag }}" title="">
                                                    @if($event->flag == '2')
                                                    <img src="{{ URL::asset('public/website/images/fill-heart.png') }}" alt="">
                                                    @else
                                                    <img src="{{ URL::asset('public/website/images/heart.png') }}" alt="">
                                                    @endif
                                                </a>
                                            </li>
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

                                </div>
                            </div>  
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>  
            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </section>
        <div class="action-btn-box">
            <a href="{{ URL('events/top') }}" class="button" title="">View All TOP EVENTS</a>
        </div><!--/.action-btn-box -->
    </div>
    <!--/.same-padd -->
    <div class="same-padd music-card" id="events">
        <div class="wrap">
            <div class="cols cols4 default-grid">
                <?php foreach ($events as $event): ?>
                    <div class="col">
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

            </div><!--/.cols cols3 -->
            <div class="action-btn-box">
                <a href="{{ URL('events/all') }}" class="button" title="">View All EVENTS</a>
            </div><!--/.action-btn-box --> 
        </div><!--/.wrap --> 
    </div><!--/.same-padd --> 
</div><!--/#main -->


@include('master.footer-website')