<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}" ></script>

{{-- @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2500
    });
</script>
@endif --}}


<script>
    snap.pay('{{ $payment }}',{
        // onSuccess:function(result){
            //     window.location.href='{{ route('penagihan.hotel.pelunasan') }}';
            // },
            // onSuccess: function(result) {
            //     window.location.href = '{{ url('pgh_hotel/paymentSuccess/'.$id) }}';
            // },
            onSuccess: function(result) {
                window.location.href = "{{ route('penagihan.hotel.paymentSuccess', $id) }}";
            },
            onPending: function(result) {
                window.location.href = "{{ route('penagihan.hotel.data') }}";
            },
            onError: function(result) {
                window.location.href = "{{ route('penagihan.hotel.data') }}";
            }
        });
        </script>

        {{-- @php
            $nomor_telepon = auth()->user()->no_telepon;
            if (substr($nomor_telepon, 0, 2) == '08') {
                $nomor_telepon = '628' . substr($nomor_telepon, 2);
            }
        @endphp
        
        <a id="whatsapp-link" href="https://wa.me/{{ $nomor_telepon }}" target="_blank" class="btn btn-success btn-normal" style="display: none;">
            <i class="fa fa-user"></i> Konfirmasi
        </a> --}}

    {{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                window.location.href='{{ route('penagihan.hotel.data') }}';
            },
            onPending: function(result){
                window.location.href='{{ route('penagihan.hotel.data') }}';
            },
            onError: function(result){
                window.location.href='{{ route('penagihan.hotel.data') }}';
            }
        });
    </script> --}}