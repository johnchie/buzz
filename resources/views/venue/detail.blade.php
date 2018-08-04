@include('master.header-website')
<div id="main">
    <div class="venue_container">
        <div class="venue_image">
            <img src="{{ URL::asset("pubic/images/venue_royal.png") }}"
        </div>
        <div class="venue_description">
            <div class="venue_title">royal papua yacht club</div>
            <div class="venue_etc">LOCATION: CHAMPION PARADE</div>
            <div class="venue_etc">PHONE: (675) 321 1700</div>
            <div class="venue_etc">HOURS OF OPERATION: 8:00am to 8:00pm</div>
        </div>
        <div>
            <a href="#">VIEW DETAIL</a>
        </div>
    </div>
</div><!--/#main -->

<style>
    .venue_container{
        
    }
    .venue_image{
        border-bottom: 1px solid #000;
        margin: 0 auto;
        text-align: center;
        display: block;
    }
    .venue_title{
        color: #f75f29;
        text-transform: uppercase;
        font-size: 15px;
        text-align: center;
    }
    .venue_etc{
        font-size:15px;
        text-transform: uppercase;
    }
</style>
@include('master.footer-website')