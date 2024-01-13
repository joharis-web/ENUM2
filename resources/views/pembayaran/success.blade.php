<x-guest-layout>  
<!-- resources/views/payments/success.blade.php -->



    <div class="bg-green-100 py-12">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-6">
            <h1 class="text-2xl font-semibold mb-4 text-center">Pembayaran Berhasil</h1>

            <p class="text-center text-lg mb-4">Terima kasih, pembayaran Anda telah berhasil diproses.</p>

            <!-- Tautan kembali ke halaman riwayat pembayaran -->
            {{-- <div class="text-center">
                <a href="{{ route('payments.history') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Lihat Riwayat Pembayaran</a>
            </div> --}}
        </div>
    </div>

    


</x-guest-layout>
