<div x-show="abaAtiva === 'campanha'">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <x-input-label for="name" required value="Nome da Campanha" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name', $campaign->name ?? '')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <x-input-label for="beginning" required value="Data e Hora Inicial da Campanha" />
                <input type="datetime-local" name="beginning" id="beginning"
                    value="{{ old('beginning', $campaign->beginning ?? '') }}"
                    class="input w-full h-11 mt-1 rounded-md" />
                <x-input-error :messages="$errors->get('beginning')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="termination" required value="Data e Hora Final da Campanha" />
                <input type="datetime-local" name="termination" id="termination"
                    value="{{ old('termination', $campaign->termination ?? '') }}"
                    class="input w-full h-11 mt-1 rounded-md" />
                <x-input-error :messages="$errors->get('termination')" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-center mt-4">
        <div class="grid grid-cols-2 gap-5">
            <div>
                <x-input-label for="title" required value="Legenda do telefone" />
                <x-text-input placeholder="whatsapp" id="title" class="block mt-1 w-full" type="text" name="title"
                    :value="old('title', $campaign->title ?? '')" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="phone" required value="Telefone" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                    :value="old('phone', $campaign->phone ?? '')" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
        </div>
        <div>
            <x-input-label for="category_id" required value="Categoria" />
            <select class="select w-full" name="category_id">
                <option disabled>Selecione uma categoria</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $campaign->category_id ?? '') == $category->id
                    ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>
    </div>

    <div class="mt-4">
        <x-input-label for="description" required value="Descrição" />
        <div id="editor" style="height: 300px; background: white;"></div>
        <textarea name="description" id="description"
            class="hidden">{{ old('description', $campaign->description ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="flex justify-end gap-3 mt-6">
        <x-button type="button" @click="abaAtiva = 'ponto'" color='blue'>Próximo</x-button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Digite a descrição...',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });


        const descriptionContent = document.querySelector('#description').value;
        if(descriptionContent) {
            quill.root.innerHTML = descriptionContent;
        }

 
        quill.on('text-change', function() {
            document.querySelector('#description').value = quill.root.innerHTML;
        });

     
        const form = document.querySelector('form');
        if(form) {
            form.addEventListener('submit', function() {
                document.querySelector('#description').value = quill.root.innerHTML;
            });
        }

  
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'x-show') {
                    const element = mutation.target;
                    if (element.getAttribute('x-show') === 'abaAtiva === \'campanha\'' && 
                        element.style.display !== 'none') {
                  
                        document.querySelector('#description').value = quill.root.innerHTML;
                    }
                }
            });
        });

        const campanhaDiv = document.querySelector('[x-show="abaAtiva === \'campanha\'"]');
        if (campanhaDiv) {
            observer.observe(campanhaDiv, { attributes: true });
        }
    });
</script>