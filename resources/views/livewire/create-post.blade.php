<!-- component -->
<div class="flex items-center justify-center min-h-screen p-6 bg-gray-100">
    <div class="container max-w-screen-lg mx-auto">
      <div>
        <div class="p-4 px-4 mb-6 bg-white rounded shadow-lg md:p-8">
          <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
           
            <div>
                <form wire:submit="create">
                    {{ $this->form }}
                    
                    <button type="submit" class="px-2 py-1 mt-4 font-bold rounded-lg bg-primary-600"  > <!-- Adicionando margem ao botão -->
                        Abrir chamado
                    </button>
                </form>
                
                <x-filament-actions::modals />
            </div>
            
           
          </div>
        </div>
      </div>
  
    
    </div>
  </div>




     


