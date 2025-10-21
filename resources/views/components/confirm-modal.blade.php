<x-confirm-modal 
    title="Excluir Doador"
    message="Tem certeza que deseja excluir este doador? Essa ação é irreversível."
    :action="route('donors.destroy', $donor->id)"
/>
