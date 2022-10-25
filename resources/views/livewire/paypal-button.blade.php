
@push('scripts')
<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AQrtlK2h1kaChYTOtYwpkDWVuTQG0otI4wXXuLq3LrlWSqDHsOMwAKv15ij9cJhTkXARRBfw4_lI3AJe&currency=USD"></script>
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

        init(event.detail.newRate)

    })

    function init(rate = @js($rate)) {
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: rate // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                });
            }
        }).render('#paypal-button-container');
    }
    init()
</script>
@endpush