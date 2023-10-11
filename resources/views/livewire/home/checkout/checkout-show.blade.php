<div class="py-3 py-md-4 checkout">
    <div class="container">
        <h4>Checkout</h4>
        <hr>

        @if ($totalAmount == 0)
            <div class="card card-body shadow text-center p-md-5">
                <h4>Your Cart is Empty</h4>
                <a href="{{ url('/collections') }}" class="btn btn-warning">Continue Shopping</a>
            </div>
        @else
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">₹{{ $totalAmount }}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br />
                        <small>* Tax and other charges are included ?</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" wire:model.defer="fullname" id="fullname" class="form-control"
                                    placeholder="Enter Full Name" />
                                @error('fullname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="number" wire:model.defer="phone" id="phone" class="form-control"
                                    placeholder="Enter Phone Number" />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" wire:model.defer="email" id="email" class="form-control"
                                    placeholder="Enter Email Address" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pin-code (Zip-code)</label>
                                <input type="number" wire:model.defer="pincode" id="pincode" class="form-control"
                                    placeholder="Enter Pin-code" />
                                @error('pincode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Full Address</label>
                                <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3" wire:ignore>
                                <label>Select Payment Mode: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link active fw-bold" wire:loading.attr="disabled"
                                            id="cashOnDeliveryTab-tab" data-bs-toggle="pill"
                                            data-bs-target="#cashOnDeliveryTab" type="button" role="tab"
                                            aria-controls="cashOnDeliveryTab" aria-selected="true">Cash
                                            on Delivery
                                        </button>
                                        <button class="nav-link fw-bold" wire:loading.attr="disabled"
                                            id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment"
                                            type="button" role="tab" aria-controls="onlinePayment"
                                            aria-selected="false">
                                            Online Payment
                                        </button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane show active fade" id="cashOnDeliveryTab" role="tabpanel"
                                            aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Cash on Delivery Mode</h6>
                                            <hr />
                                            <button type="button" wire:loading.attr="disabled" wire:click="codOrder"
                                                class="btn btn-primary">
                                                <span wire:loading.remove wire:target="codOrder">
                                                    Place Order (Cash on Delivery)
                                                </span>
                                                <span wire:loading wire:target="codOrder" class="">
                                                    <i class="fa fa-spinner fa-spin"></i> Placing Order...
                                                </span>
                                            </button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                            aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Online Payment Mode</h6>
                                            <hr />
                                            <div wire:ignore>
                                                <div id="paypal-button-container"></div>
                                            </div>
                                            {{-- <button type="button" wire:loading.attr="disabled" class="btn btn-warning">
                                                Pay Now (Online Payment)
                                            </button> --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


@push('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=ATReS54tR40r2u0Xo7PdBNmlaqn1lfJBCC1n1dZBRZnxtriUdweU_ALOZm3Xp5V8BdIEWOy1xLsCj-qE&currency=USD">
    </script>

    <script>
        window.paypal.Buttons({
                onClick() {

                    // Show a validation error if the checkbox is not checked
                    if (!document.getElementById('fullname').value ||
                        !document.getElementById('phone').value ||
                        !document.getElementById('email').value ||
                        !document.getElementById('pincode').value ||
                        !document.getElementById('address').value
                    ) {
                        $(document).ready(function() {
                            livewire.emit('ValidatedForAll');;
                        });

                        return false;
                    } else {
                        @this.set('fullname', document.getElementById('fullname').value);
                        @this.set('phone', document.getElementById('phone').value);
                        @this.set('email', document.getElementById('email').value);
                        @this.set('pincode', document.getElementById('pincode').value);
                        @this.set('address', document.getElementById('address').value);

                    }
                },
                async createOrder() {
                    try {
                        const response = await fetch("/api/orders", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },

                            body: JSON.stringify({
                                cart: [{
                                    id: "YOUR_PRODUCT_ID",
                                    quantity: "YOUR_PRODUCT_QUANTITY",
                                }, ],
                            }),
                        });

                        const orderData = await response.json();

                        if (orderData.id) {
                            return orderData.id;
                        } else {
                            const errorDetail = orderData?.details?.[0];
                            const errorMessage = errorDetail ?
                                `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})` :
                                JSON.stringify(orderData);

                            throw new Error(errorMessage);
                        }
                    } catch (error) {
                        console.error(error);
                        resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
                    }
                },
                async onApprove(data, actions) {
                    try {
                        const response = await fetch(`/api/orders/${data.orderID}/capture`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                        });

                        const orderData = await response.json();

                        const errorDetail = orderData?.details?.[0];

                        if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
                            return actions.restart();
                        } else if (errorDetail) {
                            throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
                        } else if (!orderData.purchase_units) {
                            throw new Error(JSON.stringify(orderData));
                        } else {
                            const transaction =
                                orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
                                orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
                            resultMessage(
                                `Transaction ${transaction.status}: ${transaction.id}<br><br>See console for all available details`,
                            );
                            console.log(
                                "Capture result",
                                orderData,
                                JSON.stringify(orderData, null, 2),
                            );
                        }
                    } catch (error) {
                        console.error(error);
                        resultMessage(
                            `Sorry, your transaction could not be processed...<br><br>${error}`,
                        );
                    }
                },
            })
            .render("#paypal-button-container");
    </script>
@endpush
