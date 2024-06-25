<sciprt src="https://app.sandbox.midtrans.com/snap/snap.js"  data-client-key="{{ env('MIDTRANS_API_CLIENT_KEY') }}" >
    
    <script>
        snap.pay('{{ $payment }}'
            onSuccess:function(result){
                window.location.href='{{ route('penagihan.hiburan.data') }}';
            }
        )
    </script>