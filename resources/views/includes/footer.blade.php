<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">OneTech</a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">+38 063 144 6524</div>
                    <div class="footer_contact_text">
                        <p>Kyiv</p>
                        <p>Ukraine</p>
                    </div>
                    <!--
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                    -->
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Find it Fast</div>
                    <ul class="footer_list">
                        <li><a href="{{route('shop', ['category' => 'smartphones'])}}">Smartphones</a></li>
                        <li><a href="{{route('shop', ['category' => 'cellphones'])}}">Cellphones</a></li>

                    </ul>
                    <div class="footer_subtitle">Gadgets</div>
                    <ul class="footer_list">
                        <li><a href="{{route('shop', ['category' => 'watches'])}}">Smart watches</a></li>
                        <li><a href="{{route('shop', ['category' => 'bracelets'])}}">Fitness bracelets</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        <li><a href="#"></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="{{route('login')}}">My Account</a></li>
                        <li><a href="{{route('wishlist')}}">Wish List</a></li>
                        <li><a href="{{route('contact')}}">Contact us</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>
