@extends('layouts.layout')
@section('body')
<div class="container mx-auto py-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Zahtjevi za uplatu
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Opis troška
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Naziv projekta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Osoba
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cijena
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Opcije</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $payment->description }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $payment->project }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment->person }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $payment->cost }} KM
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('payment.edit', $payment->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class='py-3 px-3'>
            {{ $payments->links() }}
        </div>
    </div>
</div>
@endsection
