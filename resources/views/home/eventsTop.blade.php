@include('master.header-website')
  <div id="main">
    <div class="same-padd music-card" id="events">
        <div class="event-title">
        <h1>TOP EVENTS</h1>
        </div>
      <div class="wrap">
        <div id="eventslist1">
            <div class="cols cols4 default-grid" >
              <?php foreach($events as $event): ?>  
              <div class="col portfolio <?php echo preg_replace('/[^a-z]/', '', strtolower($event->category_name)); ?>" data-cat="<?php echo preg_replace('/[^a-z]/', '', strtolower($event->category_name)); ?>">
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
                      <h4>{{ $event->title }}<span>{{ $event->category_name }}</span></h4>
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
                        <li><a href="#" title=""><img src="{{ URL::asset('public/website/images/share-icon.png') }}" alt=""></a></li>
                      </ul><!--/.share-option-small --> 
                    </div><!--/.event-date -->
                    <div class="event-data-box"> <a href="#" class="button">What's On</a> </div><!--/.event-data-box --> 
                  </div><!--/.action-box --> 
                </div><!--/.white-box --> 
              </div><!--/.col -->
              <?php endforeach; ?>
            </div><!--/.cols cols3 --> 
        </div>
      </div><!--/.wrap --> 
    </div><!--/.same-padd --> 
  </div><!--/#main -->

@include('master.footer-website')