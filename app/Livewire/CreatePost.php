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
use App\Filament\Components\Forms\Status;
use App\Filament\Components\User\Forms;
use Illuminate\Mail\Markdown;
use App\Models\chamadosAbertos;

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
                Section::make('Abertura de chamados')
                    ->description('Preencha os campos abaixo para relator o seu problema.')
                    ->schema([
                        Grid::make()->columns(12)
                            ->schema([
                                Select::make(name: 'assuntos')
                                ->options([
                                    'T.I.' => [
                                        'pc_nao_liga' => 'Computador não liga',
                                        'reviewing' => 'Reviewing',
                                    ],
                                    'Reviewed' => [
                                        'published' => 'Published',
                                        'rejected' => 'Rejected',
                                    ],
                                ])
                                    ->columnSpan([
                                        'sm' => 6,
                                        'xl' => 6,
                                        '2xl' => 6,
                                    ]), TextInput::make(name: 'solicitante')
                                    ->columnSpan([
                                        'sm' => 6,
                                        'xl' => 6,
                                        '2xl' => 6,
                                    ]),
                            ]),
                        FileUpload::make(name: 'anexo')
                            ->label('Anexos')
                            ->multiple()
                            ->minFiles(1)
                            ->maxFiles(5),
                        Textarea::make(name: 'comentario')
                            ->label('Comentário')
                            ->rows(10)
                            ->cols(20)

                    ]),

            ]);
    }


    public function create(): void
    {
       $data = $this->form->getState();

       chamadosAbertos::create([
            'ASSUNTO' => $data['assuntos'],
            'SOLICITANTE' => $data['solicitante']


       ]);

       
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
