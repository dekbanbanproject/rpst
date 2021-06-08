@extends('layouts.clinic_main_font')
@section('content')

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info justify-content-center">
                <div class="col-md-8">
                    <div class="row mb-5">
                    <div class="col-md-4 text-center py-4">
                        <div class="icon">
                            <span class="icon-map-o"></span>
                        </div>
                        <p><span>Address:</span> 278 หมู่ 1 บ้านหนองนกเป็ด <br/> อ.โพนทอง, จ.ร้อยเอ็ด. 45110</p>
                    </div>
                    <div class="col-md-4 text-center border-height py-4">
                        <div class="icon">
                            <span class="icon-mobile-phone"></span>
                        </div>
                        <p><span>Phone:</span>
                            <a href="tel://1234567920">+ 096-262-8218</a><br/>
                            <a href="tel:+0981581238">+098-158-1238</a>
                        </p>
                    </div>
                    <div class="col-md-4 text-center py-4">
                        <div class="icon">
                            <span class="icon-envelope-o"></span>
                        </div>
                        <p><span>Email:</span> <a href="mailto:support@projectbannok.com">support@projectbannok.com</a></p>
                    </div>
                    </div>
            </div>
            </div>
            <div class="row block-9 justify-content-center mb-5">
            <div class="col-md-8 mb-md-5">
                <h2 class="text-center">ส่งข้อความถึงเรา <br>send us a message</h2>

                <form class="bg-light p-5 contact-form" action="{{ route('Per.savecontact') }}" method="POST" >
                    @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="CON_NAME" name="CON_NAME" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="CON_EMAIL" name="CON_EMAIL" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="CON_TEL" name="CON_TEL" placeholder="Your Tel">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="CON_SUBJECT" id="CON_SUBJECT" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea name="CON_MESSAGE" id="CON_MESSAGE" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                </div>
                </form>

            </div>
        </div>

    </section>


@endsection
