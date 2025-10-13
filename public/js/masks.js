


export function formatCEP(input) {
    input.value = input.value.replace(/\D/g, '').slice(0, 8);
}

export async function fetchAddressByCEP(cep, stateInput, cityInput, neighborhoodInput, roadInput) {
    stateInput.value = '...';
    cityInput.value = '...';
    neighborhoodInput.value = '...';
    roadInput.value = '...';

    try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        if (data.erro) {
            alert('CEP não encontrado');
            clearAddressFields(stateInput, cityInput, neighborhoodInput, roadInput);
            return;
        }

        stateInput.value = data.uf;
        cityInput.value = data.localidade;
        neighborhoodInput.value = data.bairro;
        roadInput.value = data.logradouro;

    } catch {
        alert('Erro ao buscar o CEP');
        clearAddressFields(stateInput, cityInput, neighborhoodInput, roadInput);
    }
}


export function clearAddressFields(stateInput, cityInput, neighborhoodInput, roadInput) {
    stateInput.value = '';
    cityInput.value = '';
    neighborhoodInput.value = '';
    roadInput.value = '';
}


export function initCEPMask(cepInput, stateInput, cityInput, neighborhoodInput, roadInput) {
    if (!cepInput) return;
    let alertShown = false;

    cepInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 8);
        if (this.value.length === 8) {
            fetchAddressByCEP(this.value, stateInput, cityInput, neighborhoodInput, roadInput);
        } else {
            clearAddressFields(stateInput, cityInput, neighborhoodInput, roadInput);
            alertShown = false;
        }
    });
}

export function formatPhone(input) {
    let value = input.value.replace(/\D/g, '');
    if (value.length > 11) value = value.slice(0, 11);

    if (value.length > 10) value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    else if (value.length > 6) value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
    else if (value.length > 2) value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
    else if (value.length > 0) value = value.replace(/(\d{0,2})/, '($1');

    input.value = value;
}


export function initPhoneMask(phoneInput) {
    if (!phoneInput) return;
    phoneInput.addEventListener('input', function() {
        formatPhone(phoneInput);
    });
}
