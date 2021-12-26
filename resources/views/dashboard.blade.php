<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="count">Rp. {{ number_format($balance->value, 2) }}</div>

                            <h3>Balance Account</h3>
                        </div>
                    </div>

                    <br /><br />

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel">
                                <div class="title">
                                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Transfer <small>Report</small></h2>
                                </div>
                                <div class="content">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Account No
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Receiver
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Amount
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @if($transfer->count() > 0)
                                                @foreach ($transfer as $_transfer_)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{$_transfer_->rekening}}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{$_transfer_->receiver}}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{$_transfer_->value}}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{date('d F, Y', strtotime($_transfer_->created_at))}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap" colspan="4">Data is not available</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /><br />

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel">
                                <div class="title">
                                    <h2  class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Withdraw <small>Report</small></h2>
                                </div>
                                <div class="content">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Ammount
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @if($withdraw->count() > 0)
                                                @foreach ($withdraw as $_withdraw_)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{$_withdraw_->value}}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{date('d F, Y', strtotime($_withdraw_->created_at))}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap" colspan="4">Data is not available</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /><br />

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel">
                                <div class="title">
                                    <h2  class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Topup <small>Report</small></h2>
                                </div>
                                <div class="content">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Ammount
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @if($topup->count() > 0)
                                                @foreach ($topup as $_topup_)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{$_topup_->value}}</td>
                                                        <td class="px-6 py-4 whitespace-nowrap">{{date('d F, Y', strtotime($_topup_->created_at))}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap" colspan="4">Data is not available</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
