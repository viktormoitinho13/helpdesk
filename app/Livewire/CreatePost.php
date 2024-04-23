<?php

namespace App\Livewire;


use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Filament\Components\Forms\Status;
use App\Filament\Components\User\Forms;
use Illuminate\Mail\Markdown;
use App\Models\chamadosAbertos;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                Grid::make([
                    'default' => 1,
                    'sm' => 2,
                    'md' => 3,
                    'lg' => 4,
                    'xl' => 6,
                    '2xl' => 8,
                ])->schema([
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
                    ])->columnSpan([
                        'sm' => 2,
                        'xl' => 3,
                        '2xl' => 4,
                    ]), 
                    TextInput::make(name: 'solicitante')->columnSpan([
                        'sm' => 2,
                        'xl' => 3,
                        '2xl' => 4,
                    ]), 

                ]),

                    FileUpload::make(name:'anexos')->multiple() ->previewable(false)->maxFiles(5),
                    Textarea::make(name:'comentario')   
                    
                    ->rows(10)
                    ->cols(10)
                    ->minLength(10)
                    ->maxLength(2000),
                  
                  
                   
                  ])->statePath('data');
    }


    public function create(): void
    {
        $data = $this->form->getState();

        dd($data);
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
