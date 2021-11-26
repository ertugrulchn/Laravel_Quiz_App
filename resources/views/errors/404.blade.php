@extends('errors::minimal')

@section('title', 'HATA | ' . $exception->getMessage())
@section('code', '404')
@section('message', $exception->getMessage())
