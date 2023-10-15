<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white border" wire:ignore>
                    {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img"> --}}

                    <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach ($product->productImages as $productImage)
                                    <li><img src="{{ asset($productImage->image) }}" /></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn">
                                < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                        @if ($product->quantity > 1)
                            <label class="label-stock bg-success">In Stock</label>
                        @else
                            <label class="label-stock bg-danger">Out Of Stock</label>
                        @endif
                    </h4>
                    <hr>
                    <p class="product-path">
                        Home / {{ $product->category->name }} / {{ $product->name }}
                    </p>
                    <div>
                        <span class="selling-price">₹{{ $product->selling_price }}</span>
                        <span class="original-price">₹{{ $product->original_price }}</span>
                    </div>
                    <div>
                        @if ($product->productColors)
                            <div id="color-swatches">
                                @foreach ($product->productColors as $color)
                                    <div class="color-swatch" style="background-color: {{ $color->color->name }};"
                                        name="colorSelection">
                                        <i class="fas fa-check-circle checkmark-icon"></i>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mt-2">
                        <div class="input-group">
                            <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                            <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}"
                                class="input-quantity" disabled />
                            <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn1" wire:click="addToCart({{ $product->id }})"> <i
                                class="fa fa-shopping-cart"></i> Add To Cart</button>
                        <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1"> <i
                                class="fa fa-heart"></i> Add To Wishlist
                        </button>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {{ $product->small_description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 py-md-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>Related {{ $category->name }} Products</h4>
                    <div class="underline"></div>
                </div>

                <div class="col-md-12">
                    @if ($category)
                        <div class="owl-carousel owl-theme owl-carousel">
                            @foreach ($category->products->take(5) as $relatedproductItem)
                                <div class="item mb-3">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a
                                                href="{{ url('/collections/' . $relatedproductItem->category->slug . '/' . $relatedproductItem->slug) }}">
                                                <img src="{{ asset($relatedproductItem->productImages[0]->image) }}"
                                                    alt="{{ $relatedproductItem->name }}" class="product-img" />
                                            </a>
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $relatedproductItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a href="">
                                                    HP Laptop
                                                </a>
                                            </h5>
                                            <div>
                                                <span
                                                    class="selling-price">₹{{ $relatedproductItem->selling_price }}</span>
                                                <span
                                                    class="original-price">₹{{ $relatedproductItem->original_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-2">
                            <h4>No Related Products Available</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>Related {{ $product->brand }} Products</h4>
                    <div class="underline"></div>
                </div>

                <div class="col-md-12">
                    @if ($category)
                        <div class="owl-carousel owl-theme owl-carousel">
                            @foreach ($category->products->take(5) as $relatedproductItem)
                                @if ($relatedproductItem->brand == "$product->brand")
                                    <div class="item mb-3">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                <a
                                                    href="{{ url('/collections/' . $relatedproductItem->category->slug . '/' . $relatedproductItem->slug) }}">
                                                    <img src="{{ asset($relatedproductItem->productImages[0]->image) }}"
                                                        alt="{{ $relatedproductItem->name }}" class="product-img" />
                                                </a>
                                            </div>
                                            <div class="product-card-body">
                                                <p class="product-brand">{{ $relatedproductItem->brand }}</p>
                                                <h5 class="product-name">
                                                    <a href="">
                                                        HP Laptop
                                                    </a>
                                                </h5>
                                                <div>
                                                    <span
                                                        class="selling-price">₹{{ $relatedproductItem->selling_price }}</span>
                                                    <span
                                                        class="original-price">₹{{ $relatedproductItem->original_price }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="p-2">
                                <h4>No Product Found</h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {

            $("#exzoom").exzoom({
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000

            });

        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endpush
