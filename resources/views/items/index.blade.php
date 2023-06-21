<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm: lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex mb-4">
                        <a href="{{ route('items.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                          Create
                        </a>
                      </div>
                    {{-- <table class="pt-3 min-w-full divide-y divide-gray-200"> --}}
                    <table id="example" class="stripe hover w-full text-center text-sm font-light" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Terjual</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Transaksi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Barang</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($items as $no => $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $no + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->stock }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->amount }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->product_type }}</td>
                                <td class="px-6 py-4 whitespace-nowrap flex justify-center space-x-2">
                                    <a href="{{ route('items.edit', $item->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"> Edit </a>
                                    <form action="{{ route('items.destroy',[$item->id])}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"> Delete </button>
                                    </form>
                                </td>
                            </tr>
                          @endforeach
                          <!-- More rows... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
