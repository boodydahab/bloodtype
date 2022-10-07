@extends('front.master')
@section ('content')

<section>

 <body class="contact-us">


    <!--contact-us-->
    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{asset('front/assets/imgs/logo.png')}}">

                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال:</span> 124123412312</li>
                                    <li><span>فاكس:</span> 234234234</li>
                                    <li><span>البريد الإلكترونى:</span> name@name.com</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <img src="{{asset('front/assets/imgs/001-facebook.svg')}}">

                                    </div>
                                    <div class="out-icon">
                                        <img src="{{asset('front/assets/imgs/002-twitter.svg')}}">

                                    </div>
                                    <div class="out-icon">
                                        <img src="{{asset('front/assets/imgs/003-youtube.svg')}}">

                                    </div>
                                    <div class="out-icon">
                                        <img src="{{asset('front/assets/imgs/004-instagram.svg')}}">

                                    </div>
                                    <div class="out-icon">
                                        <img src="{{asset('front/assets/imgs/005-whatsapp.svg')}}">

                                    </div>
                                    <div class="out-icon">
                                        <img src="{{asset('front/assets/imgs/006-google-plus.svg')}}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">
                            <form>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="name">
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="البريد الإلكترونى" name="email">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الجوال" name="phone">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان الرسالة" name="title">
                                <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                                <button type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</section>
@stop
