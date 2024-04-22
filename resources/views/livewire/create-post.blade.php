



<div class="flex items-center justify-center h-screen">
    <div class="w-1/2">
          <form wire:submit="create">
        {{ $this->form }}
        <button >
            Envio para controler
        </button>
    </form>
    <x-filament-actions::modals />
    </div>
</div>
