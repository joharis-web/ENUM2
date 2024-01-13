<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a
                    href="{{ route('admin.pesanan.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Refresh</a>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Image
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Jumlah Pesanan
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Harga
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Total
                                        </th>
                                        <th
                                            scope="col"
                                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                            Meja
                                        </th>
                                        
                                        <th scope="col" class="relative py-3 px-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
            if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil = 'Rp ' . number_format($angka, 2, ',', '.');
        return $hasil;
    }
}
            ?>
                                    @foreach ($pesans as $pesan)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pesan->menu->name }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{ Storage::url($pesan->menu->image) }}" class="w-16 h-16 rounded">
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pesan->quantity}}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ rupiah($pesan->menu->price) }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ rupiah($pesan->menu->price * $pesan->quantity) }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pesan->table->name }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex space-x-2">
                                                <a
                                                    href="{{ route('admin.pesanan.edit', $pesan->id) }}"
                                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Edit</a>
                                                <form
                                                    class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                    method="POST"
                                                    action="{{ route('admin.pesanan.destroy', $pesan->id) }}"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>