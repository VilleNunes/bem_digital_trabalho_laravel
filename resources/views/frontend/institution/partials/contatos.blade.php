<section class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm">
    <h2 class="text-gray-900 dark:text-white text-lg font-bold">Contatos e Endereço</h2>

    @php
    // CORREÇÃO: usar $institution
    $telefone = $institution->phone ?? $institution->telefone ?? null;
    $email = $institution->email ?? $institution->contato_email ?? null;
    $site = $institution->site ?? $institution->website ?? null;
    @endphp

    <div class="mt-4 grid grid-cols-[auto_1fr] gap-x-4 gap-y-3 text-sm">
        @if($telefone)
        <span class="material-symbols-outlined text-base text-primary">phone</span>
        <p class="text-gray-700 dark:text-gray-300">{{ $telefone }}</p>
        @endif

        @if($email)
        <span class="material-symbols-outlined text-base text-primary">email</span>
        <p class="text-gray-700 dark:text-gray-300">{{ $email }}</p>
        @endif

        @if($site)
        <span class="material-symbols-outlined text-base text-primary">language</span>
        <p class="text-gray-700 dark:text-gray-300">
            <a href="{{ \Illuminate\Support\Str::startsWith($site, ['http://','https://']) ? $site : 'https://'.$site }}" target="_blank" rel="noopener" class="hover:underline">
                {{ $site }}
            </a>
        </p>
        @endif

        {{-- Endereço --}}
        @if($institution->address)
        <span class="material-symbols-outlined text-base text-primary">location_on</span>
        <p class="text-gray-700 dark:text-gray-300">
            {{ $institution->address->road ?? '' }} {{ $institution->address->number ?? '' }},
            {{ $institution->address->neighborhood ?? '' }} -
            {{ $institution->address->city ?? '' }},
            {{ $institution->address->state ?? '' }}
        </p>
        @endif
    </div>
</section>