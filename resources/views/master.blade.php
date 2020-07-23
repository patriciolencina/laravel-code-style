@extends('layouts.base')

@section('content')
    <embed-map :my-position="myPosition"
               @list-of-places-changed="listOfPlacesUpdated"></embed-map>
    <save-shops :my-position="myPosition"
                :list-of-shops="arrayOfPlaces"
                :is-saving-enabled="isSavingEnabled"></save-shops>
@endsection
