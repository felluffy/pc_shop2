<footer class="section-footer bg-dark white">
    <div class="container">
        <section class="footer-top padding-top">
            <div class="row">

                <aside class="col-sm-4  col-md-4 white">
                    <h5 class="title">My Account</h5>
                    <ul class="list-unstyled">
                        @guest
                        <li> <a href="{{ route('login') }}"> User Login </a></li>
                        <li> <a href="{{ route('register') }}"> User register </a></li>
                        @else
                        <li> <a href="{{ route('user.profile.index') }}"> Account Setting </a></li>
                        <li> <a href="#"> My Orders </a></li>
                        <li> <a href="#"> My Wishlist </a></li>
                        @endguest
                        
                    </ul>
                </aside>
                <aside class="col-sm-4  col-md-4 white">
                    <h5 class="title">About</h5>
                    <ul class="list-unstyled">
                        <li> <a href="{{route('site.about')}}"> About Us </a> </li>
                        <li> <a href="{{route('site.history')}}"> Our History </a> </li>
                        <li> <a href="{{route('site.announcements.index')}}"> Announcements </a> </li>

                    </ul>
                </aside>
                <aside class="col-sm-4">
                    <article class="white">
                        <h5 class="title">Contacts</h5>
                        <p>
                            <strong>Phone: </strong> +123456789
                            <br>
                            <strong>Fax:</strong> +123456789
                        </p>
                        <a href="{{route('site.contract')}}"><p class="pb-2 white"><strong>EMAIL US!</strong></p></a>
                        <br>
                        <div class="btn-group white">
                            <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i
                                    class="fab fa-facebook-f  fa-fw"></i></a>
                            <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i
                                    class="fab fa-instagram  fa-fw"></i></a>
                            <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i
                                    class="fab fa-youtube  fa-fw"></i></a>
                            <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i
                                    class="fab fa-twitter  fa-fw"></i></a>
                        </div>
                    </article>
                </aside>
            </div>
            <!-- row.// -->
            <br>
        </section>
        <section class="footer-bottom row border-top-white">
            <div class="col-sm-6">
                <p class="text-white-50"> Made with
                    <3 <br> by Vosidiy M.</p>
            </div>
            <div class="col-sm-6">
                <p class="text-md-right text-white-50">
                    <br>
                <a href="{{route('admin.dashboard')}}"" class="text-white-50">Admin</a>
                </p>
            </div>
        </section>
        <!-- //footer-top -->
    </div>
    <!-- //container -->
</footer>