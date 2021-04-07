<?php

namespace App\Repositories;

use App\Models\Comments;
use App\Models\Contact;
use Carbon\Carbon;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter as Filter;

class ContactRepository
{


    public function store($request)
    {
        $request = $request->request->all();
        $request['date'] = Carbon::now()->format('Y-m-d');
        $contact = new Contact();
        $contact->fill($request);
        $contact->save();
        return $contact;
    }
}
