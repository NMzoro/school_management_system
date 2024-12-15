<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUserRequest;

class AdminController extends Controller
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
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name_fr' => 'required|string',
            'last_name_fr' => 'required|string',
            'sex' => 'required|in:male,female',
            'cin' => 'required|string',
            'nationality' => 'required|string',
            'birthday' => 'required|date',
            'city' => 'required|string',
            'adress_fr' => 'required|string',
            'phone_number' => 'required|string',
            'situation' => 'required|string',
        ]);
    
        try {
            // Gestion de l'image
            $imagePath = $this->handleImageUpload($request);
            
            // Génération de l'email
            $emailAdress = $this->generateEmail($request->first_name_fr, $request->last_name_fr);
    
            // Création du compte
            $accounts = Account::create([
                'first_name_fr' => $request->first_name_fr,
                'last_name_fr' => $request->last_name_fr,
                'first_name_ar' => $request->first_name_ar,
                'last_name_ar' => $request->last_name_ar,
                'sex' => $request->sex,
                'cin' => $request->cin,
                'nationality' => $request->nationality,
                'birth_date' => $request->birthday,
                'place_of_birth_fr' => $request->city,
                'place_of_birth_ar' => $request->city_ar,
                'address_fr' => $request->adress_fr,
                'address_ar' => $request->adress_ar,
                'email_address' => $emailAdress,
                'family_situation' => $request->situation,
                'mobile_phone' => $request->phone_number,
                'photo_account' => $imagePath,
            ]);
    
            // Création de l'utilisateur
            $user = User::create([
                'name' => $request->first_name_fr . ' ' . $request->last_name_fr,
                'email' => $emailAdress,
                'role_id' => 2,
                'account_id' => $accounts->id,
                'statut' => 0,
                'password' => Hash::make('12345678'),
            ]);
    
        } catch (Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    
        return response()->json(['success' => 'Account and user created successfully']);
    }
    
    private function handleImageUpload($request)
    {
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $request->first_name_fr . '-profile.' . $extension;
            return $request->file('image')->storeAs('users', $fileName, 'public');
        }
    
        // Assigner une image par défaut selon le sexe
        return $request->sex === 'male'
            ? 'https://cdn-icons-png.flaticon.com/512/4042/4042356.png'
            : 'https://cdn-icons-png.flaticon.com/512/4139/4139967.png';
    }
    
    private function generateEmail($firstName, $lastName)
    {
        return strtolower($firstName . '.' . $lastName . '@schoolify.ma');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
