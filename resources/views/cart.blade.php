@extends('layouts.main')

@section('no-vue')
<h1>hello cart</h1>

<div class="list-group list-group-flush">
  <div class="list-group-item">Cras justo odio</div>
  <div class="list-group-item">Dapibus ac facilisis in</div>
  <div class="list-group-item">Morbi leo risus</div>
  <div class="list-group-item">Porta ac consectetur ac</div>
  <div class="list-group-item">Vestibulum at eros</div>
</div>

<div id="paypal-button-container"></div>
@endsection

@section('scripts')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>

    // Render the PayPal button

    paypal.Button.render({

        env: 'sandbox',

        style: {
            layout: 'vertical',
            size:   'medium',
            shape:  'rect',
            color:  'blue'
        },

        funding: {
            allowed: [ paypal.FUNDING.CARD, ],
            disallowed: [  paypal.FUNDING.CREDIT]
        },

        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: '<insert production client id>'
        },

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '0.01', currency: 'USD' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');
            });
        }

    }, '#paypal-button-container');

</script>
@endsection
