<x-app-layout>
    <div class="shadow bg-white border rounded w-full max-w-md mx-auto mt-10">
        <h1 class="text-3xl text-center font-semibold p-6">{{ __('Event Info') }}</h1>

        <x-flash-message :message="session('notice')" />

        <div class="px-6 pb-6">
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start">
                    {{ __('Event Start') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->start }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="start">
                    {{ __('Event End') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->end }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    {{ __('Event Type') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->title }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="guest_count">
                    {{ __('Guest Count') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->guest_count }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="child_count">
                    {{ __('Child Count') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->child_count }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="seat">
                    {{ __('Seat') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->seat }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    {{ __('Description') }}
                </label>
                <div class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight">
                    {!! nl2br(e($event->body)) !!}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="customer_name">
                    {{ __('Customer Name') }}
                </label>
                <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->customer_name }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="customer_phone">
                    {{ __('Customer Phone') }}
                </label>
                <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->customer_phone }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="receptionist_name">
                    {{ __('Receptionist Name') }}
                </label>
                <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->receptionist_name }}
                </div>
            </div>
            <div class="my-4 text-slate-500 text-lg leading-relaxed">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="final_confirmation">
                    {{ __('Final Confirmation') }}
                </label>
                <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    {{ $event->final_confirmation }}
                </div>
            </div>
            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                <span
                    class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $event->created_at ? 'NEW' : '' }}</span>
                {{ $event->created_at }}
            </p>
            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                <span
                    class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $event->updated_at ? 'NEW' : '' }}</span>
                {{ $event->updated_at }}
            </p>
            <div class="flex flex-row text-center my-4">
                <a href="javascript:history.back()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">
                    {{ __('Go back') }}
                </a>
                <a href="{{ route('events.edit', $event) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">
                    {{ __('Edit') }}
                </a>
                <form action="{{ route('events.destroy', $event) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="{{ __('Delete') }}" onclick="if(!confirm('削除しますか？')){return false};"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
