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
                                                        <a href="#" title="">
                                                            <img src="{{ URL::asset('public/website/images/share-icon.png') }}" alt="">
                                                        </a>
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