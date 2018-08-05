@include('master.header-website')
<div id="main">
    <div class="colsdemo" style="margin-top: 15px;">
        @foreach($venue_data as $venue)
        <div class="venue_container col">
            <div class="venue_image">
                <img src="{{ URL::asset("public/uploads/".$venue->logo_image) }}" height="140">
            </div>
            <div class="venue_description">
                <div class="venue_title">{{$venue->title}}</div>
                <div class="venue_etc">LOCATION: {{$venue->location}}</div>
                <div class="venue_etc">PHONE: {{$venue->phone_number}}</div>
                <div class="venue_etc">HOURS OF OPERATION: 
                    <?php
                    echo date("h:i A", strtotime(date("Y-m-d ") . $venue->open_hours)) . " - "
                    . date("h:i A", strtotime(date("Y-m-d ") . $venue->close_hours))
                    ?>
                </div>
                <div class="clearfix"></div>
                <div class="margin_div">
                    <div class="center_button">
                        <a class="button" href="{{route('venue.detail',$venue->id)}}">VIEW DETAILS</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
</div><!--/#main -->
<div class="action-btn-box"></div>
<style>
    .col{
        width: calc(25% - 60px);
        margin: 30px 30px 0 30px;
    }
    .clearfix{
        clear: both;
    }
    .center_button{
        margin:0 auto;
        width: 150px;
    }
    .margin_div{
        margin:15px 0 0 0;
    }
    .venue_container{
        box-shadow: 1px 1px 4px #000;
        float: left;
        background-color: white;
    }
    .venue_description{
        margin-left: 10px;
        margin-bottom: 15px;
        padding-bottom: 15px;
    }
    .venue_image{
        border-bottom: 1px solid #444;
        margin: 0 auto;
        text-align: center;
        display: block;
        padding:15px 0;
    }   
    .venue_title{
        color: #f75f29;
        text-transform: uppercase;
        font-size: 15px;
        margin-top: 10px;
    }
    .venue_etc{
        font-size:15px;
        text-transform: uppercase;
    }
    @media(max-width:767px){
        .col{
            width: calc(100% - 30px);
            margin: 0 15px;
        }
    }
</style>
@include('master.footer-website')