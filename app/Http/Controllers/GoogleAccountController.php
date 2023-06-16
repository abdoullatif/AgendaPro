<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleAccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('accounts', [
            'accounts' => auth()->user()->googleAccounts,
        ]);
    }

    public function store(Request $request, Google $google)
    {
        if (! $request->has('code')) {
            return redirect($google->createAuthUrl());
        }

        // Use the given code to authenticate the user.
        $google->authenticate($request->get('code'));
        
        // Make a call to the Google+ API to get more information on the account.
        $account = $google->service('Plus')->people->get('me');

        auth()->user()->googleAccounts()->updateOrCreate(
            [
                // Map the account's id to the `google_id`.
                'google_id' => $account->id,
            ],
            [
                // Use the first email address as the Google account's name.
                'name' => head($account->emails)->value,
                
                // Last but not least, save the access token for later use.
                'token' => $google->getAccessToken(),
            ]
        );

        return redirect()->route('google.index');
    }

    public function destroy(GoogleAccount $googleAccount, Google $google)
    {
        $googleAccount->delete();

        // Event though it has been deleted from our database,
        // we still have access to $googleAccount as an object in memory.
        $google->revokeToken($googleAccount->token);

        return redirect()->back();
    }


    
}
