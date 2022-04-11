<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class MyContactController extends Controller
{



    /**
     * @var string
     */
    const PAGE_TEMPLATE = 'frontcontact';

    const REDIRECT_ROUTE = 'contact.show';

    const CREATE_TEMPLATE = 'frontcontactcreate';

    const UPDATE_TEMPLATE = 'frontcontactupdate';

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view(
            self::PAGE_TEMPLATE
        );
    }

    public function create(Request $request)
    {
        return view(
            self::CREATE_TEMPLATE
        );
    }

    public function delete(Request $request, $contact_id) {
        $flight = Contact::find($contact_id); 
        $flight->delete();

        return redirect()->route(self::REDIRECT_ROUTE);
    }

    public function update(Request $request, $contact_id) {

        return view(
            self::UPDATE_TEMPLATE,['contact_id' => $contact_id]
        );
    }

}
