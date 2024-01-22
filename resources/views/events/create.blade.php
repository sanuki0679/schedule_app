<x-app-layout>
    <div class="shadow bg-white border rounded w-full max-w-md mx-auto mt-10">
        <h1 class="text-3xl text-center font-semibold p-6">{{ __('Event Form') }}</h1>

        <x-validation-errors class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mx-6" />

        <form action="{{ route('events.store') }}" method="POST" class="relative px-6 pb-6 flex-auto">
            @csrf
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start">
                    {{ __('Event Start') }}
                </label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required
                    class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" required
                    class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start">
                    {{ __('Event End') }}
                </label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required
                    class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}" required
                    class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="guest_count">
                    {{ __('Guest Count') }}
                </label>
                <input type="number" name="guest_count" id="guest_count" placeholder="{{ __('Guest Count') }}"
                    value="{{ old('guest_count') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="child_count">
                    {{ __('Child Count') }}
                </label>
                <input type="number" name="child_count" id="child_count" placeholder="{{ __('Child Count') }}"
                    value="{{ old('child_count') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="seat">
                    {{ __('Seat') }}
                </label>
                <input type="text" name="seat" id="seat" placeholder="{{ __('Seat') }}"
                    value="{{ old('seat') }}" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <!--  カテゴリープルダウン -->
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    {{ __('Event Type') }}
                </label>
                <select name="title" id="title" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                    @foreach (Config::get('type.type_name') as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    {{ __('Description') }}
                </label>
                <textarea name="body" id="body" placeholder="{{ __('Description') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline h-32">{{ old('event_details') }}</textarea>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="customer_name">
                    {{ __('Customer Name') }}
                </label>
                <input type="text" name="customer_name" id="customer_name" placeholder="{{ __('Customer Name') }}"
                    value="" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="customer_phone">
                    {{ __('Customer Phone') }}
                </label>
                <input type="number" name="customer_phone" id="customer_phone"
                    placeholder="{{ __('Customer Phone') }}" value="" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="receptionist_name">
                    {{ __('Receptionist Name') }}
                </label>
                <input type="text" name="receptionist_name" id="receptionistr_name"
                    placeholder="{{ __('Receptionist Name') }}" value="" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="final_confirmation">
                    {{ __('Final Confirmation') }}
                </label>
                <input type="text" name="final_confirmation" id="final_confirmation"
                    placeholder="{{ __('Final Confirmation') }}" value="" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <input type="submit" value="{{ __('Create') }}"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>
</x-app-layout>
