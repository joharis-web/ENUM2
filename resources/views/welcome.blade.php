<x-guest-layout>

    <!-- Main Hero Content -->
    <div
        class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
        style="background-image: url(https://d22ir9aoo7cbf6.cloudfront.net/wp-content/uploads/sites/3/2017/03/KAUM.jpg)">
        <h1
            class="font-arial text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl">
            <span class="inline md:block">Selamat Datang Di Fajar Cafe</span>
        </h1>
        <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
            Selamat datang di website untuk melakukan reservasi restaurant secara online.
        </div>
        <div class="flex flex-col items-center mt-12 text-center">
            <span class="relative inline-flex w-full md:w-auto">
                <a
                    href="{{ route('reservations.step.one') }}"
                    type="button"
                    class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-green-600 rounded-full lg:w-full md:w-auto hover:bg-green-500 focus:outline-none">
                    Make your Reservation
                </a>
            </div>
        </div>
        <!-- End Main Hero Content -->
        <section class="mt-8 bg-white">
            <div class="mt-4 text-center">
                <h3 class="text-2xl font-bold">Our Menu</h3>
                <h2
                    class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                    FAJAR CAFE
                </h2>
            </div>
            <div class="container w-full px-5 py-6 mx-auto">
                <div class="grid lg:grid-cols-4 gap-y-6">

                    @foreach ($menus as $menu)
                    <form action="{{url('/addcart',$menu->id)}}" method="post">
                        @csrf

                        <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                            <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="Image"/>
                            <div class="px-6 py-4">
                                <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                                    {{ $menu->name }}</h4>
                                <p class="leading-normal text-gray-700">{{ $menu->description }}.</p>
                            </div>
                            <div class="flex items-center justify-between p-4">
                                <span class="text-xl text-green-600">
                                    <?php
            if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil = 'Rp ' . number_format($angka, 2, ',', '.');
        return $hasil;
    }
}
            ?>
                                    {{ rupiah($menu->price) }}
                                </span>
                            </div>

                            <div align="center">
                                <input type="number" name="quantity" min="1" style="width:80px" value="1">
                            </div>

                            <div class="sm:col-span-6 pt-5">
                                <label for="status" class="block text-sm font-medium text-gray-700">Pilih Meja</label>
                                <div class="mt-1">
                                    <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1">
                                        @foreach ($tables as $table)
                                        
                                            <option value="{{ $table->id }}">{{ $table->name }}
                                                ({{ $table->guest_number }} orang)
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('table_id')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mt-1 p-1" align="center">

                                

                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white ">
                                    <svg
                                        style="width:80px;"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-10 h-10 text-white-400"
                                        fill="none"
                                        viewbox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Pesan
                                </button>
                            </div>

                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="px-2 py-32 bg-white md:px-0">
            <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
                <div class="flex flex-wrap items-center sm:-mx-3">
                    <div class="w-full md:w-1/2 md:px-3">
                        <div
                            class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
                            <!-- <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl
                            md:text-4xl lg:text-5xl xl:text-6xl" > -->
                            <h3 class="text-xl">OUR STORY
                            </h3>
                            <h2 class="text-4xl text-green-600">Welcome</h2>
                            <!-- </h1> -->
                            <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                                Restaurant kami adalah restaurant yang didirikan sejak tahun 2000 oleh Bapak
                                Khairul Walidin dan Muhd. Almeer Farsha untuk menjalankan usaha kuliner yang
                                otentik di daerah Aceh. Mereka membawa dan menggabungkan konsep teknologi dan
                                kuliner dalam membentuk usaha mereka. Waktu terus berjalan dan restaurant kami
                                juga berkembang sangat pesat setelah 22 tahun hadir untuk melayani anda.
                            </p>
                            <div class="relative flex">
                                <a
                                    href="#_"
                                    class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-green-600 rounded-md sm:mb-0 hover:bg-green-700 sm:w-auto">
                                    Read More
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 ml-1"
                                        viewbox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                            <img
                                src="https://s3.ap-southeast-1.amazonaws.com/cdn.orbit/wp-content/uploads/2022/01/07142031/medja1.jpg"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-20 bg-gray-50">
            <div
                class="container items-center max-w-6xl px-4 px-10 mx-auto sm:px-20 md:px-32 lg:px-16">
                <div class="flex flex-wrap items-center -mx-3">
                    <div class="order-1 w-full px-3 lg:w-1/2 lg:order-0">
                        <div class="w-full lg:max-w-md">
                            <h2 class="mb-4 text-2xl font-bold">About Us</h2>
                            <h2
                                class="mb-4 text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                                Kenapa Restaurant Kami?</h2>

                            <p class="mb-4 font-medium tracking-tight text-gray-400 xl:mb-6">Lorem ipsum
                                dolor sit amet Kami menyediakan konsep yang menarik, yaitu konsep teknologi dan
                                konsep kuliner yang digabung menjadi satu kesatuan. Kami juga memberikan
                                pelayanan dan rasa terbaik yang dapat kami berikan kepada pelanggan kami.
                                Berikut adalah fitur-fitur unggulan dari restaurant kami.</p>
                            <ul>
                                <li class="flex items-center py-2 space-x-4 xl:py-3">
                                    <svg
                                        class="w-8 h-8 text-gray-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                    </svg>
                                    <span class="font-medium text-gray-500">Berkonsep Teknologi</span>
                                </li>
                                <li class="flex items-center py-2 space-x-4 xl:py-3">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-8 h-8 text-gray-500"
                                        fill="none"
                                        viewbox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="font-medium text-gray-500">Menerima banyak metode pembayaran</span>
                                </li>
                                <li class="flex items-center py-2 space-x-4 xl:py-3">
                                    <svg
                                        class="w-8 h-8 text-gray-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewbox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <span class="font-medium text-gray-500">100% Halal</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-12 lg:w-1/2 order-0 lg:order-1 lg:mb-0"><img
                        class="mx-auto sm:max-w-sm lg:max-w-full"
                        src="https://cdn.pixabay.com/photo/2021/05/25/02/03/restaurant-6281067_960_720.png"
                        alt="feature image"></div>
                </div>
            </div>
        </section>
        <section class="pt-4 pb-12 bg-gray-800">
            <div class="my-16 text-center">
                <h2
                    class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                    Testimonial
                </h2>
                <p class="text-xl text-white">Mari kita dengar kata mereka yang sudah berkunjung ke restaurant kami!</p>
            </div>
            <div class="grid gap-2 lg:grid-cols-3">
                <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
                    <div class="flex justify-center -mt-16 md:justify-end">
                        <img
                            class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
                            src="data:image/jpeg;base64,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">
                    </div>
                    <div>
                        <h2 class="text-3xl font-semibold text-gray-800">Food</h2>
                        <p class="mt-2 text-gray-600">Makanan ini sangat enak dan sangat keren. Konsep
                            yang dibawakan unik dan otentik.</p>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-xl font-medium text-green-500">Client 1</a>
                    </div>
                </div>
                <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
                    <div class="flex justify-center -mt-16 md:justify-end">
                        <img
                            class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Menteri_Pertahanan_Prabowo_Subianto.jpg/640px-Menteri_Pertahanan_Prabowo_Subianto.jpg">
                    </div>
                    <div>
                        <h2 class="text-3xl font-semibold text-gray-800">Food</h2>
                        <p class="mt-2 text-gray-600">Makanan ini sangat enak dan sangat keren. Konsep
                            yang dibawakan unik dan otentik.</p>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-xl font-medium text-green-500">Client 2</a>
                    </div>
                </div>
                <div class="max-w-md p-4 bg-white rounded-lg shadow-lg">
                    <div class="flex justify-center -mt-16 md:justify-end">
                        <img
                            class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
                            src="https://thumb.viva.co.id/media/frontend/thumbs3/2022/06/21/62b15fcd037fb-ekspresi-ketua-umum-pdi-perjuangan-megawati-soekarnoputri-usai-dipuji-jokowi_665_374.jpg">
                    </div>
                    <div>
                        <h2 class="text-3xl font-semibold text-gray-800">Food</h2>
                        <p class="mt-2 text-gray-600">Makanan ini sangat enak dan sangat keren. Konsep
                            yang dibawakan unik dan otentik.</p>
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-xl font-medium text-green-500">Client 3</a>
                    </div>
                </div>
            </div>
        </section>

    </x-guest-layout>