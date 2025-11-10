<div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
    x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false"
    class="fixed inset-0 z-30 flex w-full items-start justify-center bg-black/20 p-4 pb-8 backdrop-blur-md lg:p-8"
    role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
    <!-- Modal Dialog -->
    <div x-show="modalIsOpen"
        x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
        x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
        class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
        <!-- Dialog Header -->
        <div
            class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                Trocar de Instituição</h3>
            <button x-on:click="modalIsOpen = false" aria-label="close modal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                    fill="none" stroke-width="1.4" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Dialog Body -->
        <div class="px-4 py-8">
            <div class="px-4 py-8">
                <form id="changeInstitutionForm" action="{{ route('changeInstitution') }}" method="post">
                    @method('patch')
                    @csrf

                    <div class="flex flex-col gap-3 w-[500px]">
                        @foreach (institutions() as $institution)
                        <div
                            class="flex items-center gap-2 font-medium text-on-surface has-disabled:opacity-75 dark:text-on-surface-dark">
                            <input id="institution_{{ $institution->id }}" type="radio" name="institution_id"
                                value="{{ $institution->id }}"
                                class="relative h-4 w-4 appearance-none rounded-full border border-outline checked:bg-primary checked:border-primary transition-colors cursor-pointer"
                                {{ $institution->id === auth()->user()->institution_id ? 'checked' : '' }}
                            onchange="document.getElementById('changeInstitutionForm').submit();">
                            <label for="institution_{{ $institution->id }}" class="text-sm cursor-pointer">
                                {{ $institution->fantasy_name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </form>
            </div>

        </div>
        <!-- Dialog Footer -->
        <div
            class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
            <button x-on:click="modalIsOpen = false" type="button"
                class="whitespace-nowrap rounded-sm px-4 py-2 text-center text-sm font-medium tracking-wide  text-neutral-600 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Fechar</button>
        </div>
    </div>
</div>