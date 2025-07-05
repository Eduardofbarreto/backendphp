document.addEventListener('DOMContentLoaded', function(){
    const cepInput = document.getElementById('cep');
    const ruaInput = document.getElementById('rua');
    const numeroInput = document.getElementById('numero');
    const bairroInput = document.getElementById('bairro');
    const cidadeInput = document.getElementById('cidade');
    const estadoInput = document.getElementById('estado');

    // Get the date input field
    const dataNascimentoInput = document.getElementById('dataNascimento');

    // --- New: Automatic Date Formatting ---
    dataNascimentoInput.addEventListener('input', function(e) {
        let value = e.target.value;
        // Remove all non-digit characters
        value = value.replace(/\D/g, '');

        // Apply formatting based on length
        if (value.length > 4) {
            value = value.replace(/^(\d{2})(\d{2})(\d{0,4}).*/, '$1/$2/$3');
        } else if (value.length > 2) {
            value = value.replace(/^(\d{2})(\d{0,2}).*/, '$1/$2');
        }
        e.target.value = value;
    });
    // --- End New ---

    cepInput.addEventListener('blur', function(){
        const cep = this.value.replace(/\D/g, '');
        if(cep.length === 8){
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if(!data.erro){
                    ruaInput.value = data.logradouro || '';
                    bairroInput.value = data.bairro || '';
                    cidadeInput.value = data.localidade || '';
                    estadoInput.value = data.uf || '';
                    numeroInput.focus();
                }else{
                    alert('CEP não encontrado. Por favor, verifique e tente novamente.');
                    clearAddressFields();
                }
            })
            .catch(error => {
                console.error('Erro ao buscar dados do CEP: ', error);
                alert('Erro ao buscar dados do CEP. Por favor, tente novamente.');
                clearAddressFields();
            });
        }else{
            clearAddressFields();
        }
    });

    function clearAddressFields(){
        ruaInput.value = '';
        numeroInput.value = '';
        bairroInput.value = '';
        cidadeInput.value = '';
        estadoInput.value = '';
    }
});