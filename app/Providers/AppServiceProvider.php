<?php

namespace App\Providers;

// Doador
use App\Repositories\Doador\DoadorRepo;
use App\Repositories\Doador\IDoadorRepo;

// Endereco
use App\Repositories\Endereco\EnderecoRepo;
use App\Repositories\Endereco\IEnderecoRepo;

// FichaDoacao
use App\Repositories\FichaDoacao\IFichaDoacaoRepo;
use App\Repositories\FichaDoacao\FichaDoacaoRepo;


// Funcionario
use App\Repositories\Funcionario\FuncionarioRepo;
use App\Repositories\Funcionario\IFuncionarioRepo;

// Pessoa (talvez n precise)
use App\Repositories\Pessoa\IPessoaRepo;
use App\Repositories\Pessoa\PessoaRepo;

// Descartado
use App\Repositories\ReservaTecnica\IDescartadoRepo;
use App\Repositories\Descartado\DescartadoRepo;

// Em Analise
use App\Repositories\ReservaTecnica\IEmAnaliseRepo;
use App\Repositories\EmAnalise\EmAnaliseRepo;

// Encaminhado
use App\Repositories\ReservaTecnica\IEncaminhadoRepo;
use App\Repositories\Encaminhado\EncaminhadoRepo;

// Exposicoes
use App\Repositories\ReservaTecnica\IExposicoesRepo;
use App\Repositories\Exposicoes\ExposicoesRepo;

// Reserva Tecnica
use App\Repositories\ReservaTecnica\IReservaTecnicaRepo;
use App\Repositories\ReservaTecnica\ReservaTecnicaRepo;

// Provider
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Endereco
        $this->app->bind(IEnderecoRepo::class, EnderecoRepo::class);

        // Pessoa --> talvez seja preciso retirar isso
        $this->app->bind(IPessoaRepo::class, PessoaRepo::class);

        // Doação
        $this->app->bind(IFichaDoacaoRepo::class, FichaDoacaoRepo::class);

        // Funcionario -> chama with('pessoas')
        $this->app->bind(IFuncionarioRepo::class, FuncionarioRepo::class);

        // Doador -> chama with('pessoas')
        $this->app->bind(IDoadorRepo::class, DoadorRepo::class);
        
        // Em Analise
        $this->app->bind(IEmAnaliseRepo::class, EmAnaliseRepo::class);

        // Reserva Tenica
        $this->app->bind(IReservaTecnicaRepo::class, ReservaTecnicaRepo::class);

        // Emprestado/Encaminhado
        $this->app->bind(IEncaminhadoRepo::class, EncaminhadoRepo::class);

        // Exposicoes
        $this->app->bind(IExposicoesRepo::class, ExposicoesRepo::class);

        // Descartado
        $this->app->bind(IDescartadoRepo::class, DescartadoRepo::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 
    }
}
