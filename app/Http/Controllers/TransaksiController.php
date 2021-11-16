<?php

namespace App\Http\Controllers;
use App\Kebijakan;
use App\Kategori;
use App\Transaksi;
use App\User;
use App\ViewKebijakan;
use Carbon\Carbon;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use App\Http\Requests\TransaksiRequest;


class TransaksiController extends Controller
{
     public function __construct()
    {
        $this->authorizeResource(Transaksi::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaksi $model)
    {
        $role = auth()->user()->role_id;
        if($role ==1 ) {


        return view('Transaksi.index', ['transaksis' => $model->with(['kebijakans', 'kategoris','getprovs','getcities'])->get()]);
        } else {
            $idprov = auth()->user()->prov_id;
            $transprov = Transaksi::where('id_prov', $idprov);
            return view('Transaksi.index', ['transaksis' => $transprov->with(['kebijakans', 'kategoris','getprovs','getcities'])->get()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kebijakan $kebijakanModel, Kategori $kategoriModel, User $userModel)
    {
        return view('transaksi.create', [
            'kebijakans' => $kebijakanModel->get(['id', 'name']),
            'kategoris' => $kategoriModel->get(['id', 'name']),
            'users' => $userModel->get(['id','name','prov_id'])
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransaksiRequest $request, Transaksi $model)
    {
        //$file = $request->file('file')->getClientOriginalName();
        //dd($request);
       
        $transaksi = $model->create($request->merge([
            'file' => $request->dokumen->store('files', 'public')

        ])->all());
        //dd($transaksi);


        return redirect()->route('transaksi.create')->withStatus(__('Transaksi successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
