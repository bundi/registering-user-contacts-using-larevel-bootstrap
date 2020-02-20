@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
            <h1 class="display-3">Contacts</h1>
                <div>
                    <a href="{{route('contacts.create')}}" style="margin: 19px" class="btn btn-primary">New contact</a>
                </div>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">City</th>
                        <th scope="col">Country</th>
                        <th scope="col">Job title</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{$contact->id}}</th>
                        <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->city}}</td>
                        <td>{{$contact->country}}</td>
                        <td>{{$contact->job_title}}</td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            <div>
            </div>
@endsection
