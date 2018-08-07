@include('master.header-website')
<div id="main" style="background:url('{{ URL::asset('public/images/contact_bg.jpg') }}');background-size: cover;">
    <div class="same-padd advertisers">
        <div class="wrap">
            <h3 class="contact_title"> Contact Us</h3>
            <div class='icon_container'>
                <div class="col-md-4">
                    <div class="inner_container">
                        <div><img src="{{ URL::asset('public/images/contact_home.png') }}"></div>
                        <div class="icon_text">VISIT</div>
                        <div class="sub_text">Let's have coup of tea coffee to discuss your business idea! </div>
                        <div class="last_text">802-B Synergy  Tower, Ahmedabad</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="inner_container">
                        <div><img src="{{ URL::asset('public/images/contact_call.png') }}"></div>
                        <div class="icon_text">CALL</div>
                        <div class="sub_text">Feel free to give us a call! </div>
                        <div class="last_text">+44 (0) 203 116 7711</div>
                    </div>

                </div>

                <div class="col-md-4 border-none">
                    <div class="inner_container">
                        <div><img src="{{ URL::asset('public/images/contact_email.png') }}"></div>
                        <div class="icon_text">EMAIL</div>
                        <div class="sub_text">You can also reach out to us via email! </div>
                        <div class="last_text">noreply@noland.com</div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="inquire_container">
                <div class="inquire_title">
                    ENQUIRE NOW
                </div>
                <form name="contact_ff" class="contact_ff" action="#"onsubmit="return valid_form();">
                    <div class="contact_form">
                        <input type="text" id="name" name="name" class="contact_input class_one" placeholder="Name" required="">
                        <input type="email" id="email" name="email" class="contact_input class_two" placeholder="Email" required="">
                        <div class="clearfix"></div>
                        <input type="text" name="phone" id="phone" class="contact_input class_one" placeholder="Phone" required="">
                        <select name="type" id="type" class="contact_input class_two" required="">
                            <option value="1">Feature</option>
                            <option value="1">new</option>
                            <option value="1">old</option>
                        </select>
                        <div class="clearfix"></div>
                        <textarea name="message" id="message" class="contact_textarea" placeholder="Enter Message" required=""></textarea>
                        <div class="captcha_container">
                            <div id="calculation">10 + 5 =</div>
                            <div class="captcha"><input type="text" class="contact_input" id="captcha"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="submit_container">
                            <input type="submit" value="Submit" class="contact_submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div><!--/.wrap -->
    </div><!--/.advertisers -->
</div><!--/#main -->

<style>
    .submit_container{
        width: 150px;
        margin: 0 auto;
    }
    .class_one{
        float: left !important;
        width: 49% !important;
        margin-right: 1% !important;
        margin-left: 10px;
        margin-top: 10px !important;
    }
    .class_two{
        float: left !important;
        width: 49% !important;
        margin-left: 1% !important;
        margin-top: 10px !important;
    }
    .clearfix{
        clear: both;
    }
    .inquire_title{
        background: #fff;
        opacity: 0.3;
        text-align: center;
        font-size: 19px;
        font-weight: bold;
        color:#000;
        padding: 15px 0;
    }
    .inquire_container{
        border:1px solid #efefef;
        margin-top: 50px;
        margin-left: 10px;
        margin-right: 10px;
        border-radius: 8px;
    }
    .contact_form{
        margin: 60px;

    }
    .contact_input{
        background: #c3b4b1;
        padding: 0;
        opacity: 0.4;
        height: 40px !important;
    }
    .contact_textarea{
        background: #c3b4b1;
        padding-left: 5px;
        opacity: 0.6;
        margin-top: 10px;
    }
    .contact_submit{
        background: #39a335 !important;
        text-align: center;
        margin:0 auto !important;
        width:150px;
    }
    #calculation{
        color:#fff;
        float: left;
        margin-right: 15px;
        margin-top: 10px;
    }
    .captcha{
        float: left;
    }
    .captcha_container{
        float: right;
        margin-top: 10px;
    }

    .contact_title{
        color:#fff;text-align: center;font-weight: bold;margin:20px 0 40px 0;
    }
    .icon_text{
        font-weight: bold;color:#fff;font-size: 25px;margin-top: 10px;
    }
    .col-md-4{
        float:left;
        width: 33%;
        border-right: 2px solid #fff;
    }
    .border-none{
        border-right:none !important;
    }
    .sub_text{
        color:#6b6361;
        margin-top: 20px;
    }
    .last_text{
        color:#fff;
        margin-top: 20px;
    }
    .inner_container{
        width: 50%;
        text-align: center;
        margin-left: 25%;
        margin-top: 15px;
    }
    @media(max-width:769px){
        .col-md-4{
            width:100%;
            border: none;
        }
    }
</style>
@include('master.footer-website')
<script>
    var start = Math.floor(Math.random() * 20) + 1 ;
    var end = Math.floor(Math.random() * 20) + 1 ;
    jQuery('#calculation').html(start + ' + ' + end + '=');
    
    function valid_form() {
        if(jQuery('#captcha').val() != parseInt(start) + parseInt(end)){
            toastr.error('Captcha is invalid!');
            return false;
        }
        jQuery.ajax({
            url: "{{route('contactusEmail')}}",
            type: "get",
            data: $('.contact_ff').serialize(),
            dataType: 'json',
            cache: false,
            beforeSend: function () {
                //$('#loading').show();
            },
            complete: function ()
            {
                //$('#loading').hide();
            },
            success: function (response)
            {
                if (response.success) {
                    toastr.success('Thank you for contacting us.');
                    $('.contact_ff').trigger('reset');
                    start = Math.floor(Math.random() * 20) + 1 ;
                    end = Math.floor(Math.random() * 20) + 1 ;
                    jQuery('#calculation').html(start + ' + ' + end + '=');
                } else {
                    toastr.error('Error sending email!');
                }
            },
            error: function () {
                toastr.error('Error sending email!');
            }
        });
        return false;
    }
</script>