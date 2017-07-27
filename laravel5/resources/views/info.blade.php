@extends('template')
{{--
@section('contenu')
    <form method="POST" action="{!! url('users') !!}" accept-charset="UTF-8">
        {!! csrf_field() !!}
        <label for="nom">Entrez votre nom : </label>
        <input name="nom" type="text" id="nom">
        <label for="prenom">Entrez votre prenom : </label>
        <input name="prenom" type="text" id="prenom">
        <input type="submit" value="Envoyer !">
    </form>
    --}}

@section('contenu')
    {!! Form::open(['url' => 'users']) !!}
    {!! Form::label('nom', 'Entrez votre nom : ') !!}
    {!! Form::text('nom') !!}
    {!! Form::submit('Envoyer !') !!}
    {!! Form::close() !!}
@stop