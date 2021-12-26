<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transfer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel">
                                <!-- Validation Errors -->
                                <x-transfer.validation-errors class="mb-4" :errors="$errors" />

                                @if (\Session::has('success'))
                                    <x-transfer.success class="mb-4" :success="\Session::get('success')" />
                                @endif
                                <div class="title">
                                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form Transfer</h2>
                                </div>
                                <div class="x_content">
                                    <form method="POST" action="{{ route('transfer-store') }}">
                                        @csrf

                                        <p>Your Account Balance</a>
                                        </p>

                                        <span class="section">Rp. {{ number_format($balance->value, 2) }}</span>

                                        <br /><br />

                                        <div class="mt-4">
                                            <x-label for="receiver" :value="__('Nomor Rekening')" :is_required="true" />

                                            <x-input id="rekening" class="block mt-1 w-full"
                                                     type="number"
                                                     name="rekening"
                                                     :value="old('rekening')" required />
                                        </div>

                                        <div class="mt-4">
                                            <x-label for="penerima" :value="__('Penerima')" :is_required="true" />

                                            <x-input id="receiver" class="block mt-1 w-full"
                                                     type="text"
                                                     name="receiver"
                                                     :value="old('receiver')" required />
                                        </div>

                                        <div class="mt-4">
                                            <x-label for="value" :value="__('Jumlah')" :is_required="true" />

                                            <x-input id="value" class="block mt-1 w-full"
                                                     type="number"
                                                     name="value"
                                                     :value="old('value')" required />
                                        </div>

                                        <div class="flex items-center sm:justify-start mt-4">
                                            <x-button class="ml-4">
                                                {{ __('Submit Transfer') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
