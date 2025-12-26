<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('account.account', compact('accounts'));
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
    public function store(StoreAccountRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        Account::create($data);

        return redirect()->back()->with('success', 'Account created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        abort_unless($account->user_id === $request->user()->id, 403);

        $account->update($request->validated());

        return back()->with('success', 'Account updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        abort_unless($account->user_id === request()->user()->id, 403);

        $account->delete();

        return back()->with('success', 'Account deleted.');
    }
}
