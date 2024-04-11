<?php

namespace App\Livewire;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;



class CreatePost extends Component implements HasForms
{
    use InteractsWithForms; 

    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }

        
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                    Grid::make(12)
                        ->schema([
                                Grid::make()
                                ->columnSpan(4)
                                ->schema([
                                  Section::make('Assunto')
                                  ->description('Selecione abaixo o assunto desejado.')
                                  ->schema([
                               
                                    Select::make('status')
                                    ->hiddenLabel()
                                     ->options([
                                    'draft' => 'Draft',
                                    'reviewing' => 'Reviewing',
                                    'published' => 'Published',
                                     ]),
                                     TextInput::make('text')
                                     ->label('Solicitante')
                                     ->required(),
                                    ])


                                ]),

                                Grid::make()
                                ->columnSpan(8)
                                ->schema([
                                  Section::make()
                                  ->schema([
                               
                                   Textarea::make('Descrição')
                                        ->rows(10)
                                        ->cols(20)
                                        ->required(),

                                        FileUpload::make('Anexos')
                                        ->disk('s3')
                                        ->directory('form-attachments')
                                        ->visibility('private')
                                        ->multiple()
                                    ])


                                ]),

            

                                 ]),
                    
            ])
            ->statePath('data');
    }
    

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
