<?php

namespace App\Providers;

use App\Repositories\Doacao\DoacaoRepo;
use App\Repositories\Doacao\IDoacaoRepo;

// Doador
use App\Repositories\Doador\DoadorRepo;
use App\Repositories\Doador\IDoadorRepo;

// Endereco
use App\Repositories\Endereco\EnderecoRepo;
use App\Repositories\Endereco\IEnderecoRepo;

// FichaRegistro
use App\Repositories\FichaRegistro\FichaRegistroRepo;
use App\Repositories\FichaRegistro\IFichaRegistroRepo;

// Fluxo
use App\Repositories\Fluxo\FluxoRepo;
use App\Repositories\Fluxo\IFluxoRepo;

// Funcionario
use App\Repositories\Funcionario\FuncionarioRepo;
use App\Repositories\Funcionario\IFuncionarioRepo;

// Pessoa (talvez n precise)
use App\Repositories\Pessoa\IPessoaRepo;
use App\Repositories\Pessoa\PessoaRepo;

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
        $this->app->bind(IDoacaoRepo::class, DoacaoRepo::class);

        // Funcionario -> chama with('pessoas')
        $this->app->bind(IFuncionarioRepo::class, FuncionarioRepo::class);

        // Doador -> chama with('pessoas')
        $this->app->bind(IDoadorRepo::class, DoadorRepo::class);

        // Ficha Registro
        $this->app->bind(IFichaRegistroRepo::class, FichaRegistroRepo::class);
        
        // Fluxo -> deve chamar with('status')
        $this->app->bind(IFluxoRepo::class, FluxoRepo::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 
    }
}
