<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create',
            [
                'locations' => [
                    'cities' => [
                        'São Paulo', 'Rio de Janeiro', 'Brasília', 'Salvador', 'Fortaleza', 'Belo Horizonte', 'Manaus', 'Curitiba', 'Recife',
                        'Goiânia', 'Belém', 'Porto Alegre', 'São Luís', 'Maceió', 'Campo Grande', 'Natal', 'Teresina', 'João Pessoa', 'Aracaju',
                        'Cuiabá', 'Porto Velho', 'Macapá', 'Florianópolis', 'Boa Vista', 'Rio Branco', 'Vitória', 'Palmas', 'Guarulhos', 'Niterói',
                        'Uberlândia', 'Campinas', 'Londrina', 'Caxias do Sul', 'São Bernardo do Campo', 'Duque de Caxias', 'Contagem', 'Maringá',
                        'Pelotas', 'Joinville', 'Vila Velha'
                    ],
                    'states' => [
                        'AC' => 'Acre', 'AL' => 'Alagoas', 'AP' => 'Amapá', 'AM' => 'Amazonas', 'BA' => 'Bahia', 'CE' => 'Ceará',
                        'DF' => 'Distrito Federal', 'ES' => 'Espirito Santo', 'GO' => 'Goiás', 'MA' => 'Maranhão', 'MT' => 'Mato Grosso',
                        'MS' => 'Mato Grosso do Sul', 'MG' => 'Minas Gerais', 'PA' => 'Pará', 'PB' => 'Paraíba', 'PR' => 'Paraná',
                        'PE' => 'Pernambuco', 'PI' => 'Piauí', 'RJ' => 'Rio de Janeiro', 'RN' => 'Rio Grande do Norte',
                        'RS' => 'Rio Grande do Sul', 'RO' => 'Rondônia', 'RR' => 'Roraíma', 'SC' => 'Santa Catarina', 'SP' => 'São Paulo',
                        'SE' => 'Sergipe', 'TO' => 'Tocantins'
                    ],
                    'regions' => [
                        'Midwest', 'North', 'North East', 'South', 'Southeast'
                    ]
                ]
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $storeLocationRequest)
    {
        Location::create(
            $storeLocationRequest->validated()
        );
        return redirect()->route('locations.store')->with('success', 'Location registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
