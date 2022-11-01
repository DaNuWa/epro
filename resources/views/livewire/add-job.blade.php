<div>
    <div class="container">
        <button type="button" class="round-black-btn" data-toggle="modal" data-target="#form">
            Pay
        </button>
    </div>

    <div wire:ignore.self class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">Please fill these fields before proceed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($success)
                <div class="alert alert-success" role="alert">
                    Your payment has been received.Thank you
                </div>
                @endif
                <div class="modal-body">

                    <div style="margin-left:207px" wire:loading class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea wire:model="description" class="form-control" placeholder="Brief description about what need to do by the service provider">
                        </textarea>
                        <small class="form-text text-muted">Brief description about what need to do by the service provider.</small>
                    </div>
                    <div class="form-group">
                        <label for="hours">Agreed hours</label>
                        <input wire:model="hours" type="number" min="1" class="form-control" id="hours" placeholder="Please add the agreed hours to complete this task">
                    </div>
                    <div class="form-group">
                        <label for="rate">Rate</label>
                        <input wire:model="rate" type="number" disabled class="form-control" id="rate" placeholder="Total payable amount for the accepted hours">
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button wire:click.prevent="handlePayment" class="btn btn-success">Submit</button>
                </div>


                <div id="cont">
                    <div id="paypal-button-container">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@push('styles')
<style>
    .container {
        padding: 2rem 0rem;
    }

    h4 {
        margin: 2rem 0rem;
    }

    .panel {
        border-radius: 4px;
        padding: 1rem;
        margin-top: 0.2rem;
        background-color: #F5F5F5;
        color: #323B40;
    }

    .panel.panel-blue {
        background-color: #E0F5FF;
        color: #00A5FA;
    }

    .panel.panel-big-height {
        min-height: 150px;
    }

    .item {
        border-radius: 4px;
        padding: 0.5rem;
        margin: 0.2rem;
    }

    .item.item-blue {
        background-color: #B9E5FE;
        color: #00A5FA;
    }

    .item.item-green {
        background-color: #B7E0DC;
        color: #019888;
    }

    .item.item-lime {
        background-color: #C7E8C8;
        color: #42B045;
    }

    .item.item-yellow {
        background-color: #FFEEBA;
        color: #FF9901;
    }

    .item.item-pink {
        background-color: #FABAD0;
        color: #EF075F;
    }

    .item.item-red {
        background-color: #FEC9C6;
        color: #FD3D08;
    }

    .item.item-big-width {
        min-width: 380px;
    }
</style>

@endpush

@push('scripts')
<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=ATeer2LuvhQF9ggG5-WBTyi5FIDQ2SbUuyLlSOymVTZbVavgDIgtoEiOVPm6GqD3iZLjcknqN5iTUDsz&disable-funding=credit&currency=USD"></script>
<!-- Set up a container element for the button -->
<script>
    window.addEventListener('rate-updated', event => {
        var d = document.getElementById('cont');
        var olddiv = document.getElementById('paypal-button-container');
        d.removeChild(olddiv);

        var ni = document.getElementById('cont');
        var newdiv = document.createElement('div');
        newdiv.setAttribute('id', 'paypal-button-container');
        ni.appendChild(newdiv);

        if (event.detail.addButton) {
            init(event.detail.newRate)

        }


    })

    function init(rate = @js($rate)) {
        paypal.Buttons({
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: rate
                        }
                    }]
                });
            },
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    console.log(transaction)
                    Livewire.emit('transactionSuccess', {
                        'id': transaction.id
                    })

                });
            }
        }).render('#paypal-button-container');
    }
</script>
@endpush