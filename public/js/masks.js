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

export function formatCPF(input) {
    let value = input.value.replace(/\D/g, '').slice(0, 11);
    if (value.length > 9) {
        value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2})/, '$1.$2.$3-$4');
    } else if (value.length > 6) {
        value = value.replace(/(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
    } else if (value.length > 3) {
        value = value.replace(/(\d{3})(\d{0,3})/, '$1.$2');
    }
    input.value = value;
}

export function validateCPF(cpfRaw) {
    if (!cpfRaw) return false;
    const cpf = cpfRaw.replace(/\D/g, '');
    if (cpf.length !== 11) return false;
    if (/^(\d)\1{10}$/.test(cpf)) return false;

    const calcDigit = (cpfSlice) => {
        let sum = 0;
        for (let i = 0; i < cpfSlice.length; i++) {
            sum += parseInt(cpfSlice.charAt(i), 10) * (cpfSlice.length + 1 - i);
        }
        const rest = (sum * 10) % 11;
        return rest === 10 ? 0 : rest;
    };

    const digit1 = calcDigit(cpf.slice(0, 9));
    const digit2 = calcDigit(cpf.slice(0, 9) + digit1);

    return digit1 === parseInt(cpf.charAt(9), 10) && digit2 === parseInt(cpf.charAt(10), 10);
}

export function initCPFMask(cpfInput, options = {}) {
    if (!cpfInput) return;
    const { validateOnBlur = true, showAlertOnInvalid = true } = options;

    cpfInput.addEventListener('input', function() {
        formatCPF(this);
    });

    if (validateOnBlur) {
        cpfInput.addEventListener('blur', function() {
            const isValid = validateCPF(this.value);
            if (!isValid && this.value.replace(/\D/g, '').length > 0) {
                if (showAlertOnInvalid) alert('CPF inválido');
            }
        });
    }
}

export function formatKg(input) {
    let value = input.value.replace(/\D/g, '');

    if (value === '') {
        input.value = '';
        return;
    }


    while (value.length < 3) {
        value = '0' + value;
    }

    let cents = value.slice(-2); 
    let kilos = value.slice(0, -2); 
  
    kilos = kilos.replace(/^0+/, '');
    if (kilos === '') kilos = '0';


    kilos = kilos.replace(/\B(?=(\d{3})+(?!\d))/g, ".");


    input.value = `${kilos},${cents}`;
}

export function initKgMask(weightInput) {
    if (!weightInput) return;
    

    weightInput.addEventListener('input', function() {
        formatKg(weightInput);
    });
    
  
    formatKg(weightInput);
}