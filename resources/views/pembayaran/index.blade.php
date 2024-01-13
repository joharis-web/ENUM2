<x-guest-layout>
    <!-- resources/views/payment/index.blade.php -->
    
    
    
    
        <div class="bg-gray-100 py-12">
            <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg p-6">
                <h1 class="text-2xl font-semibold mb-4 text-center">Pembayaran</h1>
    
                <!-- Informasi Pesanan -->
                <div class="mb-6">
                    
                    <h2 class="text-lg font-semibold mb-2">Detail Pesanan</h2>

                    <form 
                action="{{ route('payment.process') }}" method="POST"
                >
                    @csrf
                    
                    @foreach($pesans as $pesan)
                    <!-- Tampilkan detail pesanan di sini -->
                    <!-- Contoh: -->
                    
        
                    <div class="flex justify-between mb-2">
                        <p> 
                            <i><strong>* *</strong></i>
                            
                            {{ $pesan->menu->name }}
                        </p>
                        <p>
                            
                            {{ $pesan->menu->price }}
                        </p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p>Jumlah</p>
                        <p>{{ $pesan->quantity}}</p>
                        
                    </div>
                    <div class="flex justify-between mb-2">
                        <p>Total</p>
                        
                        <p>{{ $pesan->menu->price * $pesan->quantity }}</p>
                    </div>
                    @endforeach

                    <div class="flex justify-between pt-4 border-b">
                        <div
                            class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                            Total
                        </div>
                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                            
                            {{ $total }}
                        </div>
                    </div>
                    
                    
                </div>
    
                <!-- Formulir Pembayaran -->
                
                
                    
                        
                        <!-- Informasi Pesanan -->
                        <!-- ... -->
                        
                        <!-- Informasi pembayaran (nama, alamat, metode pembayaran, dll.) -->
                        
                        <!-- ... -->
                    
                        
                    
                        <!-- Menambahkan hidden input untuk mengirim data ke server -->

                    
                        >
                        <!-- ... -->
                    
                        
                    

                    <!-- Informasi pembayaran (nama, alamat, metode pembayaran, dll.) -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="name" name="name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    
                    <div class="mb-4">
                        <label for="payment_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                        <select id="payment_method" name="payment_method" required onchange="showBankInfo()"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="cash">Cash</option>
                            <option value="bank_transfer">Transfer Bank</option>
                            <!-- ... pilihan lainnya -->
                        </select>
                    </div>
    
                    <div id="bank_info" class="hidden">
                        <h2 class="text-lg font-semibold mb-2">Informasi Rekening Bank</h2>
                        <p>Nama Bank: Bank BCA</p>
                        <p>Nomor Rekening: 2440343921</p>
                        
                        <!-- ... informasi lainnya ... -->
                    </div>

                    <div id="proofField" style="display: block;">
                        <label for="payment_proof">Bukti Pembayaran:</label>
                        <input type="file" name="payment_proof" id="payment_proof" accept="image/*">
                    </div>
    
                    
                    <button type="submit"
                            class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                        Bayar Sekarang
                    </button>
                </form>
            </div>
        </div>

        
        
    
        <script>
            function showBankInfo() {
                var paymentMethod = document.getElementById("payment_method").value;
                var bankInfo = document.getElementById("bank_info");
    
                if (paymentMethod === "bank_transfer") {
                    bankInfo.classList.remove('hidden');
                } else {
                    bankInfo.classList.add('hidden');
                }
            }
        </script>
    
    
    </x-guest-layout>