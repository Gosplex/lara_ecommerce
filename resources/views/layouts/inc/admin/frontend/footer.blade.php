<div>
    <div class="footer-area" style="background-color: {{ $websiteSetting->color_code }};">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">Majestic Stores</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ url('/contact-us') }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    <div class="mb-2"><a href="{{ url('/sitemaps') }}" class="text-white">Sitemaps</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Latest Categories</h4>
                    <div class="footer-underline"></div>
                    @foreach ($categoriesDisplay as $catDisplay)
                        <div class="mb-2"><a href="{{ url('/collections/' . $catDisplay->slug) }}"
                                class="text-white">{{ $catDisplay->name }}</a></div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i>
                            {{ $websiteSetting->website_address ??
                                '#444, some main road, some area, some street, rajkot,
                                                                                                                                                                        india - 360006' }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $websiteSetting->phone_1 ?? '+91 888-XXX-XXXX' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i>
                            {{ $websiteSetting->email_1 ?? 'contact@majesticstores.com' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - Majestic Stores - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media text-white">
                        Get Connected:
                        <a href="{{ url($websiteSetting->twitter) }}"><i class="fa fa-twitter"
                                style="color: white"></i></a>
                        <a href="{{ url($websiteSetting->instagram) }}"><i class="fa fa-instagram"></i></a>
                        <a href="{{ url($websiteSetting->youtube) }}"><i class="fa fa-youtube"></i></a>
                        <a href="{{ url($websiteSetting->facebook) }}"><i class="fa fa-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
