@extends('backend.layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-2">Você está aqui</h1>

<nav class="text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
    <ol class="list-reset flex">
        <li class="text-gray-700 font-semibold">Conteúdo <span class="mx-2">/</span></li>
        <li>
            <a href="{{ route('campaign.index') }}" class="text-blue-600 hover:underline">Campanhas</a>
            <span class="mx-2">/</span>
        </li>
        <li class="text-gray-700 font-semibold">Campanha {{ $campaign->name }} - Fotos</li>
    </ol>
</nav>

<x-card>

    <form 
        action="{{ route('campaign.updateImages', $campaign) }}" 
        method="POST" 
        enctype="multipart/form-data"
        x-data="imageManager({{ $campaign->id }}, {{ $campaign->photos->toJson() }})"
        @submit.prevent="submitForm"
    >
        @csrf
        @method('POST')

        {{-- Galeria existente --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Imagens salvas</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                <template x-for="(img, index) in savedImages" :key="img.id">
                    <div class="relative">
                        <img :src="img.filename" class="rounded shadow-md w-full h-32 object-cover">
                        <button 
                            type="button" 
                            @click="deleteSavedImage(img.id, index)"
                            class="absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700"
                        >
                            Excluir
                        </button>
                    </div>
                </template>
                <template x-if="savedImages.length === 0">
                    <p class="text-gray-500 text-sm col-span-full">Nenhuma imagem salva.</p>
                </template>
            </div>
        </div>

        {{-- Upload de novas imagens --}}
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Adicionar novas imagens</h2>
            <input 
                type="file" 
                multiple 
                accept="image/*"
                @change="previewFiles"
                name="images[]"
                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md p-2 mb-3"
            >

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                <template x-for="(img, index) in newImages" :key="index">
                    <div class="relative">
                        <img :src="img.filename" class="rounded shadow-md w-full h-32 object-cover">
                        <button 
                            type="button" 
                            @click="removeNewImage(index)"
                            class="absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700"
                        >
                            Remover
                        </button>
                    </div>
                </template>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <x-button-link :href="route('campaign.index')">Cancelar</x-button-link>
            <x-button color="blue" type="submit" > Salvar alterações</x-button>
        </div>

    </form>

</x-card>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageManager', (campaignId, savedImagesData) => ({
            campaignId,
            savedImages: savedImagesData || [],
            newImages: [],

            previewFiles(event) {
                const files = event.target.files;
                this.newImages = [];

                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = e => {
                        this.newImages.push({ file, filename: e.target.result });
                    };
                    reader.readAsDataURL(file);
                });
            },

            removeNewImage(index) {
                this.newImages.splice(index, 1);
            },

            deleteSavedImage(id, index) {
                if (confirm('Tem certeza que deseja excluir esta imagem?')) {
                    fetch(`/campaigns/${this.campaignId}/photo/${id}/delete-image`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    }).then(response => {
                        if (response.ok) {
                            this.savedImages.splice(index, 1);
                        } else {
                            alert('Erro ao excluir imagem.');
                        }
                    });
                }
            },

            submitForm(event) {
                event.target.submit();
            }
        }));
    });
</script>

@endsection
