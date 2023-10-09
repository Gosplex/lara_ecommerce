<div class="wrapper">
    <div class="d-md-flex align-items-md-center">
        <div class="h3">{{ $category->name }}</div>
        <div class="ml-auto d-flex align-items-center views"> <span
                class="green-label px-md-2 mr-2 px-1">{{ $productCount }}</span> <span class="text-muted">Products</span>
        </div>
    </div>

    <div id="mobile-filter">
        <div class="py-3">
            <h5 class="font-weight-bold">Brands</h5>
            <form class="brand">
                @foreach ($category->brands as $catBrand)
                    <div class="form-inline d-flex align-items-center py-1"> <label class="tick">{{ $catBrand->name }}
                            <input type="checkbox" value="{{ $catBrand->name }}"> <span class="check"></span> </label>
                    </div>
                @endforeach
            </form>
        </div>
        {{-- Price Filtering Secttion --}}
        <div class="py-3">
            <h5 class="font-weight-bold">Price</h5>
            <form class="brand">
                <div class="form-inline d-flex align-items-center py-1 radio">
                    <label class="options">High to Low
                        <input type="radio" value="high-to-low" wire:model='priceInputs' wire:click='applyFilter'>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-inline d-flex align-items-center py-1 radio">
                    <label class="options">Low to High
                        <input type="radio" value="low-to-high" wire:model='priceInputs' wire:click='applyFilter'>
                        <span class="checkmark"></span>
                    </label>
                </div>
            </form>
        </div>
    </div>
    <div class="content py-md-0 py-3">
        <section id="sidebar">
            <div class="py-3">
                <h5 class="font-weight-bold">Brands</h5>
                <form class="brand">
                    @foreach ($category->brands as $catBrand)
                        <div class="form-inline d-flex align-items-center py-1"> <label
                                class="tick">{{ $catBrand->name }}
                                <input type="checkbox" value="{{ $catBrand->name }}" wire:model='brandInputs'
                                    wire:click='applyFilter'> <span class="check"></span>
                            </label> </div>
                    @endforeach
                </form>
            </div>
            {{-- Price Filter --}}
            <div class="py-3">
                <h5 class="font-weight-bold">Price</h5>
                <form class="brand">
                    <div class="form-inline d-flex align-items-center py-1 radio">
                        <label class="options">High to Low
                            <input type="radio" value="high-to-low" wire:model='priceInputs' wire:click='applyFilter'>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-inline d-flex align-items-center py-1 radio">
                        <label class="options">Low to High
                            <input type="radio" value="low-to-high" wire:model='priceInputs' wire:click='applyFilter'>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </form>
            </div>
        </section>
        <!-- Products Section -->
        <section id="products">
            <div class="container py-3">
                <div class="row">
                    @forelse ($products as $productItem)
                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                            <div class="card product-card mb-3">
                                <div>
                                    @if ($productItem->quantity > 0)
                                        <label class="stock bg-success">In Stock</label>
                                    @else
                                        <label class="stock bg-danger">Out of Stock</label>
                                    @endif
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                            alt="{{ $productItem->name }}" class="product-img" />
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h6 class="font-weight-bold pt-1">{{ $productItem->name }}</h6>
                                    <div class="text-muted description">{{ $productItem->brand }}</div>
                                    <div class="d-flex align-items-center product"> <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="far fa-star"></span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <div class="d-flex flex-column">
                                            <div class="h6 font-weight-bold">₹{{ $productItem->selling_price }}</div>
                                            <div class="text-muted rebate text-decoration-line-through">
                                                ₹{{ $productItem->original_price }}</div>
                                        </div>
                                        <div>
                                            <p>Available: {{ $productItem->quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <h4 class="text-center">No Product Found</h4>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</div>
