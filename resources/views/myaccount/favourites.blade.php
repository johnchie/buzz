@include('master.header-website')

<div id="main">
    <div class="same-padd">
        <div class="profile-box same-padd">
            @if (\Session::has('message'))
            <div class="alert alert-info">
                {!! \Session::get('message') !!}
            </div>
            @endif
            <div class="wrap">
                @include('myaccount.account_menu')
                <div class="profile-dataright">
                    <div class="white-box">
                        <div class="favourites">
                            <div class="cols cols3 default-grid" >
                                @if(empty($events))
                                <div class="alert alert-info">
                                    There no any event in your favourite list
                                </div>
                                @else
                                @foreach($events as $event)
                                <div class="col">
                                    <div class="white-box"> 
                                        <a href="#" title="">
                                            <img src="{{ url('public/uploads/'.$event->image) }}" height="215" class="entity-img" /> 
                                        </a>
                                        <div class="event-data">
                                            <div class="event-date">
                                                <h5>
                                                    <span><?php echo date('F', $event->start_date) ?></span> <?php echo date('d', $event->start_date) ?><sup><?php echo date('S', $event->start_date) ?></sup> to 
                                                    <span><?php echo date('F', $event->end_date) ?></span> <?php echo date('d', $event->end_date) ?><sup><?php echo date('S', $event->end_date) ?></sup>
                                                </h5>
                                            </div><!--/.event-date -->
                                            <div class="event-data-box">
                                                <h4>{{ $event->title }}<span>{{ $event->category_name }}</span></h4>
                                                <h6>@ {{ $event->venue }}</h6>
                                            </div><!--/.event-data-box --> 
                                        </div><!--/.event-data -->
                                        <div class="action-box">
                                            <div class="event-date">
                                                <ul class="share-option-small">
                                                    <li>
                                                        <a href="{{route("event_unfav",$event->id)}}" title="">
                                                            <img src="{{ URL::asset('public/website/images/fill-heart-icon.png') }}" alt="">
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
                                            <div class="event-data-box"> 
                                                <a href="{{route('events.detail',$event->id)}}" class="button">What’s On</a> 
                                            </div><!--/.event-data-box --> 
                                        </div><!--/.action-box --> 
                                    </div><!--/.white-box --> 
                                </div><!--/.col -->
                                @endforeach
                                @endif
                            </div><!--/.cols cols3 default-grid -->
                        </div><!--/.favourites -->
                    </div><!--/.white-box -->
                </div><!--/.profile-dataright -->
            </div><!--/.wrap -->
        </div><!--/.profile-box -->
    </div><!--/.advertisers -->
</div><!--/#main -->

@include('master.footer-website')