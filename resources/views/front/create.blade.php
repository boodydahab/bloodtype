@extends('front.master')
@section ('content')

<section>

    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الإسم">

                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكترونى">

                    <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="فصيلة الدم">

                    <select class="form-control" id="governorates" name="governorate">
                        <option selected disabled hidden value="">المحافظة</option>
                        <option value="1">الدقهلية</option>
                        <option value="2">الغربية</option>
                    </select>

                    <select class="form-control" id="cities" name="city">
                        <option  selected disabled hidden value="">المدينة</option>
                    </select>

                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف">

                    <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور">

                    <div class="create-btn">
                        <input type="submit" value="إنشاء"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>


    footer
    <div class="footer">
        <div class="inside-footer">
            <div class="container">
                <div class="row">
                    <div class="details col-md-4">
                        <img src="imgs/logo.png">
                        <h4>بنك الدم</h4>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها.
                        </p>
                    </div>
                    <div class="pages col-md-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action" id="list-home-list" href="index.html" role="tab" aria-controls="home">الرئيسية</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" href="#" role="tab" aria-controls="profile">عن بنك الدم</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" href="#" role="tab" aria-controls="messages">المقالات</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="donation-requests.html" role="tab" aria-controls="settings">طلبات التبرع</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="who-are-us.html" role="tab" aria-controls="settings">من نحن</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="contact-us.html" role="tab" aria-controls="settings">اتصل بنا</a>
                        </div>
                    </div>
                    <div class="stores col-md-4">
                        <div class="availabe">
                            <p>متوفر على</p>
                            <a href="#">
                                <img src="{{asset('front/assets/imgs/google1.png')}}">

                            </a>
                            <a href="#">
                                <img src="imgs/ios1.png">
                                <img src="{{asset('front/assets/imgs/ios1.png')}}">

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="other">
            <div class="container">
                <div class="row">
                    <div class="social col-md-4">
                        <div class="icons">
                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="rights col-md-8">
                        <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@stop
