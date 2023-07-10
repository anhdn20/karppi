@extends('site.layout')
@section('content')

<section class="banner home home_section_b">
    <div class="boxbanner">
        <x-banner :banner="$data['banner_contact']"></x-banner>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">{{__('Get in touch')}}</h3>

                                @if(session('send_mail_success'))
                                    <div id="form-message-success" class="mb-4">
                                        Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất, xin cảm ơn!
                                    </div>
                                @endif
                                <form method="POST" action="{{url('/send-mail')}}" id="contactForm" name="contactForm" class="contactForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">{{__('FULL NAME')}}</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="{{__('Name')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">{{__('EMAIL ADDRESS')}}</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="{{__('Email')}}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">{{__('SUBJECT')}}</label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">{{__('MESSAGE')}}</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="{{__('Message')}}"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="{{__('Send Message')}}" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                <h3>{{__('Let\'s get in touch')}}</h3>
                                <p class="mb-4">{{__('We\'re open for any suggestion or just to have a chat')}}</p>
                        <div class="dbox w-100 d-flex align-items-start">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>{{__('Address')}}:</span> B12 Phú Thuận, P. Phú Thuận, Q.7, TP.HCM</p>
                          </div>
                      </div>
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>{{__('Phone')}}:</span> <a href="tel://1234567920">+84 98 398 3966</a></p>
                          </div>
                      </div>
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>Email:</span> <a href="mailto:clubmed@gmail.com">clubmed@gmail.com</a></p>
                          </div>
                      </div>
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-globe"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>Website</span> <a href="#">yoursite.com</a></p>
                          </div>
                      </div>
                  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d251433.92538431016!2d105.47473429453122!3d10.045294399999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08802e47b3083%3A0x5b6e5a03285c9576!2zVmluY29tIFBsYXphIEjDuW5nIFbGsMahbmc!5e0!3m2!1svi!2s!4v1685022180928!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

@endsection

