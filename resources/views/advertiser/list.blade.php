@include('master.header-website')
<div id="main">
    <div class="same-padd advertisers">
        <div class="wrap">
            <h3>Advertisers</h3>
            <figure class="abou-pic"><img src="{{ url('/public/images/about-pic.png') }}" alt=""></figure>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since </p>
            <p><span>subscription information</span><br>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since </p>
        </div><!--/.wrap -->
    </div><!--/.advertisers -->
    <div class="plans">
        <div class="wrap">
            <div class="cols cols3 default-grid">
                @foreach($plans as $plan)
                <div class="col">
                    <div class="plan-detail {{$plan['color']}}">
                        <h2>{{$plan['name']}}</h2>
                        <h5><sup>$</sup>{{$plan['price']}}/<span>{{$plan['unit']}}</span></h5>
                        <a href="javascript:void(0);" title="Subscribe now" attr_id="{{$plan['id']}}" class="button subscribe_btn">subscribe</a>
                    </div>
                </div><!--/.col -->
                @endforeach
            </div><!--/.cols cols3 default-grid -->
        </div><!--/.wrap -->
    </div><!--/.plans -->
</div><!--/#main -->

@include('master.footer-website')